<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication was successful...
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended('/hotel/admin/dashboard')->withSuccess('Login!');
            } else if ($user->role == 'receptionist') {
                return redirect()->intended('/hotel/receptionist/dashboard')->withSuccess('Login!');
            } else {
                return redirect()->back()->with('error', 'Invalid user role.');
            }
        }

        // Authentication failed...
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
