<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(Request $request)
    {
        try {
            return view('auth.login');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Login Attempt');
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $remember = $request->boolean('remember');

            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();

                $user = Auth::user();
                $organization = $user->currentOrganization();

                if (!$organization) {
                    Auth::logout();
                    return back()->withErrors(['email' => 'No organization assigned to this user.']);
                }

                session(['current_organization_id' => $organization->id]);

                return redirect()->to(route('master.dashboard'));
            }

            return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
        } catch (\Exception $e) {
            return $this->handleException($e, 'LoginController@login');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');
        } catch (\Exception $e) {
            return $this->handleException($e, 'LoginController@logout');
        }
    }

    public function forgotPasswordGet()
    {
        try {
            return view('auth.forgot-password');
        } catch (\Exception $e) {
            return $this->handleException($e, 'LoginController@forgotPasswordGet');
        }
    }

    public function forgotPasswordPost(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email']);
            // Implement password reset logic here
            return back()->with('status', 'Password reset link sent!');
        } catch (\Exception $e) {
            return $this->handleException($e, 'LoginController@forgotPasswordPost');
        }
    }
}
