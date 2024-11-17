<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    

    public function loginIndex(Request $request) {
        if (Auth::user()) {
            return redirect()->route('dashboard');
        }
        return view('pages.auth.login');
    }
    public function loginPost(Request $request) {
        $data = $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:3',
            'remember' => 'nullable'
        ]);

        $remember = isset($data['remember']);

        if(auth()->attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['message' => 'Invalid credentials. Please try again.']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
