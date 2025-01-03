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

    public function blog_show($slug){
        return view('guest.post_show', [
            'pageTitle' => 'Blog Detail',
        ]);
    }

    public function login(){
        if(Auth::check()){
            return redirect()->route('admin.dashboard');
        }else{
            return view('guest.login', [
                'pageTitle' => 'Sign In',
            ]);
        }
    }

    public function login_auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('admin.dashboard'))->with('success', 'Welcome back, '.auth()->user()->name.'!');
        }
        return back()->with(['error', 'Login failed!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('guest.home'))->with('success', 'Logging out.. Hope to see you soon!');
    }

    public function register(){
        if(Auth::check()){
            return redirect()->route('admin.dashboard');
        }else{
            return view('guest.register', [
                'pageTitle' => 'Sign Up',
            ]);
        }
    }

    public function forgot_password(){
        return view('guest.forgot_password', [
            'pageTitle' => 'Forgot Password',
        ]);
    }
}
