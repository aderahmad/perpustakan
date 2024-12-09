<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function formLogin(){
        return view('form-login');
    }

    public function ProsesLogin(Request $req){
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $kredensial = $req->only('email', 'password');

    if (Auth::attempt($kredensial)) {
        return redirect()->intended('master/beranda/beranda');
    }else{
        return redirect()->intended('/')
        ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }
    
    // return redirect('login')
    //         ->withInput()
    //         ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }
    
}
