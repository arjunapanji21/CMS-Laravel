<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function home(){
        return view('guest.'.config('app.homepage'), [
            'pageTitle' => 'Home',
        ]);
    }

    public function login(){
        // dd(auth());
        return view('guest.login', [
            'pageTitle' => 'Sign In',
        ]);
    }

    public function login_auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('admin.dashboard'));
        }
        return back()->with(['error', 'Login failed!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('guest.home'));
    }

    public function register(){
        return view('guest.register', [
            'pageTitle' => 'Sign Up',
        ]);
    }

    public function forgot_password(){
        return view('guest.forgot_password', [
            'pageTitle' => 'Forgot Password',
        ]);
    }
}
