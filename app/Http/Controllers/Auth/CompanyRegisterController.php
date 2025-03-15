<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyRegisterController extends Controller
{
    public function companyRegister()
    {
        return view('auth.company-register');
    }

    public function companyLogin()
    {
        return view('auth.company-login');
    }

    public function companyRegisterStore(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'company' => 'required|string|max:255',
            'company_type' => 'required|string|max:255',
            'employee_size' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'term' => 'required|accepted',
            'g-recaptcha-response' => $request->input('g-recaptcha-response') ? 'required|captcha' : '',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new user
        $user = User::create([
            'company' => $request->company,
            'company_type' => $request->company_type,
            'employee_size' => $request->employee_size,
            'industry' => $request->industry,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        // Send welcome email
        // Mail::to($user->email)->send(new WelcomeUser($user));

        return redirect()->route('company_login')->with('success', 'Registration successful! Please login.');
    }

    public function companyLoginStore(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed
            $request->session()->regenerate(); // Regenerate session for security

            // Redirect to the intended page or dashboard
            return redirect()->intended('/company-dashboard')->with('success', 'Login successful!');
        }

        // Authentication failed
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/')->with('success', 'You have been logged out.');
    }
}
