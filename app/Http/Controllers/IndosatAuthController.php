<?php

namespace App\Http\Controllers;

use App\Models\IndonesiaEvent;
use App\Models\IndosatUser;
use App\Models\IndosatUsersCredit;
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
            return redirect()->route('indosat.webinar');
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
        $events = IndonesiaEvent::get();
        $signed_up_events = IndonesiaEvent::get();
        $credits = IndosatUsersCredit::where('user_id', auth('indosat_user')->user()->id)->get();
        return view('indosat_webinar', compact('events', 'signed_up_events', 'credits'));
    }
    public function webinarDetails($id)
    {
        $details = IndonesiaEvent::find($id);
        $selected_events = IndonesiaEvent::get();
        $previous_events = IndonesiaEvent::get();
        return view('indosat_webinar_details', compact('details', 'selected_events', 'previous_events'));
    }

    public function filterCreditAjax(Request $request)
    {
        $userId = auth('indosat_user')->user()->id;
        $month = $request->input('month');

        if ($month == null) {
            return IndosatUsersCredit::where('user_id', $userId)->get();
        } else {
            $date = \Carbon\Carbon::createFromFormat('Y-m', $month);
            $selectedMonth = $date->format('m');
            $selectedYear = $date->format('Y');

            return IndosatUsersCredit::where('user_id', $userId)
                ->whereMonth('created_at', $selectedMonth)
                ->whereYear('created_at', $selectedYear)
                ->get();
        }
    }
}
