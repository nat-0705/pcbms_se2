<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login()
    {
        $users['headline']  = 'Login';
        return view('login.form', $users);
    }

    public function confirm(LoginRequest $request)
    {
        $credentials = $request->only(['email','password']);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return redirect()->route('login')->withErrors(['email' => 'The provided credentials do not match our records.',]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
