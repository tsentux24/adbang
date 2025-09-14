<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login(){
        return view('auth.login');
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'Email' => 'required',
            'pass' => 'required'
        ], [
            'Email.required' =>'Email Wajib Di Isi',
            'pass.required'=>'Password Wajib Di isi',
        ]);
        $infologin=[
            'email' => $request->Email,
            'password'=> $request->pass,
        ];
        if(Auth::attempt($infologin)) {
            $request->session()->regenerate();
            if(Auth::user()->role ==="administrator") {
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->intended('/frontEnd');
            }
            }
                return redirect('/')->withErrors('Username Dan Password Salah')->withInput();
        }
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->withErrors('Anda Berhasil Logout');
        }
}
