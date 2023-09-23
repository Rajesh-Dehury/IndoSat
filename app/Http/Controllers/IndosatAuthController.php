<?php

namespace App\Http\Controllers;

use App\Models\IndosatUser;
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
        return view('indosat_webinar');
    }
    public function webinarDetails()
    {
        return view('indosat_webinar_details');
    }
}
