<?php

namespace App\Http\Controllers;

use App\Models\IndonesiaEvent;
use App\Models\IndosatEventUser;
use App\Models\IndosatUser;
use App\Models\IndosatUsersCredit;
use App\Models\UserWebinarPreference;
use App\Models\WebinarCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndosatAuthController extends Controller
{
    public function loginView()
    {
        return view('indosat_login_page');
    }
    public function login(Request $request)
    {
        $request->validate([
            'unique_code' => 'required|exists:indosat_users,unique_code',
            'password' => 'required',
        ]);

        if (Auth::guard('indosat_user')->attempt(['unique_code' => $request->unique_code, 'password' => $request->password])) {
            return redirect()->route('indosat.webinar');
        }

        return redirect()
            ->back()
            ->withErrors(['unique_code' => 'Invalid Credentials.'])
            ->withInput();
    }
    public function signupView()
    {
        return view('indosat_signup_page');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'unique_code' => 'required|exists:indosat_users,unique_code',
            'password' => 'required|confirmed',
        ]);

        $indosatUser = IndosatUser::where('unique_code', $request->unique_code)->first();

        if ($indosatUser->is_signup == true) {
            return redirect()->back()
                ->withErrors(['unique_code' => 'The unique code is already signed up.'])
                ->withInput();
        }

        $indosatUser->update(
            [
                'password' => Hash::make($request->password),
                'is_signup' => true,
                'created_at' => now(),
            ]
        );

        if (Auth::guard('indosat_user')->loginUsingId($indosatUser->id)) {
            return redirect()->route('indosat.webinar')->with('popup', true);
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('indosat_user')->logout();
        return redirect()->route('indosat.login');
    }

    public function webinar()
    {
        $user = Auth::guard('indosat_user')->user();

        $events = IndonesiaEvent::get();
        $signed_up_events = [];

        if ($user) {
            $signed_up_events = $user->userEvents;
        }
        $webinar_categories = WebinarCategory::all();
        $user_webinar_categories_array = $user->webinarPreferences->pluck('webinar_category_id')->toArray();

        // 
        $last_credit = IndosatUsersCredit::where('user_id', $user->id)->where('type', 1)->where('is_credit', 1)->latest()->first();
        $latest_exp_credit = IndosatUsersCredit::where('user_id', $user->id)->where('type', 1)->where('is_credit', 1)->orderByRaw('ABS(DATEDIFF(expired, NOW()))')->first();
        // 
        $used_credits = $user->getTotalWebinarUsedCredits();
        $total_credits = $user->getTotalWebinarUserCredits();
        $exp_credits = $user->getTotalWebinarExpiryCredits();
        $available_credits = ($total_credits - $used_credits) - $exp_credits;

        if ($available_credits < 0) {
            $available_credits = 0;
        }

        return view('indosat_webinar', compact('events', 'signed_up_events', 'webinar_categories', 'user_webinar_categories_array', 'used_credits', 'available_credits', 'exp_credits', 'last_credit', 'latest_exp_credit'));
    }
    public function webinarDetails($id)
    {
        $user = Auth::guard('indosat_user')->user();

        $details = IndonesiaEvent::find($id);
        $selected_events = [];

        if ($user) {
            $selected_events = $user->userEvents;
        }

        $previous_events = IndonesiaEvent::get();
        return view('indosat_webinar_details', compact('details', 'selected_events', 'previous_events'));
    }

    public function filterCreditAjax(Request $request)
    {
        $userId = auth('indosat_user')->user()->id;
        $month = $request->input('month');

        $data = [];
        if ($month == null) {
            $data = IndosatUsersCredit::where('user_id', $userId)
                ->where('type', 1)
                ->get();
        } else {
            $date = \Carbon\Carbon::createFromFormat('Y-m', $month);
            $selectedMonth = $date->format('m');
            $selectedYear = $date->format('Y');

            $data = IndosatUsersCredit::where('user_id', $userId)
                ->where('type', 1)
                ->whereMonth('created_at', $selectedMonth)
                ->whereYear('created_at', $selectedYear)
                ->get();
        }

        return $data;
    }

    public function werbinarConfirm(Request $request)
    {
        $user = Auth::guard('indosat_user')->user();
        if (is_null($user)) {
            return back();
        }

        $request->validate([
            'event_id' => 'required',
        ]);

        $event = IndonesiaEvent::find($request->event_id);

        $existingEvent = IndosatEventUser::where('event_id', $request->event_id)
            ->where('indosat_user_id', $user->id)
            ->first();

        $used_credits =  $user->getTotalWebinarUsedCredits();
        $total_credits = $user->getTotalWebinarUserCredits();
        $exp_credits = $user->getTotalWebinarExpiryCredits();
        $available_credits = ($total_credits - $used_credits) - $exp_credits;

        if ($available_credits > 0) {
            if (!$existingEvent) {

                IndosatEventUser::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'contact_number' => $user->contact_number,
                    'indosat_user_id' => $user->id,
                    'event_id' => $request->event_id,
                    'event_name' => $event->name,
                    'event_slug' => $event->url,
                    'is_payment' => 0,
                ]);

                IndosatUsersCredit::create([
                    'user_id' => $user->id,
                    'credit' => 1,
                    'type' => 1,
                    'is_credit' => 2,
                    'indonesia_event_id' => $event->id,
                    'package_name' => $event->name,
                ]);
            }
        }
        return back();
    }

    public function syncPreference(Request $request)
    {
        if (Auth::guard('indosat_user')->check()) {
            $user = Auth::guard('indosat_user')->user();

            $request->validate([
                'interest' => 'required|array',
            ]);

            UserWebinarPreference::where('user_id', $user->id)->delete();

            foreach ($request->interest as $interest) {
                UserWebinarPreference::create([
                    'user_id' => $user->id,
                    'webinar_category_id' => $interest,
                    'created_at' => now(),
                ]);
            }

            return back()->with('success', 'Webinar preferences updated successfully');
        }

        return back()->with('error', 'User is not authenticated');
    }
}
