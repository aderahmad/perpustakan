<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function formRegister(){
        return view('form-register');
    }

    public function simpanRegister(Request $req)
    {
        try {
            $this->validate($req,[
                'name' => 'required|string|max:255',
                'username' => 'required|max:255',
                'email' => 'required|string|email|unique:register',
                'password' => 'required|string|min:8'
            ]);
            $datas = $req->all();
            $save_data = new Register;
            $save_data->name = $datas['name'];
            $save_data->username = $datas['username'];
            $save_data->email = $datas['email'];
            $save_data->password = Hash::make($datas['password']);
            $save_data->save();
            return redirect()->route('login.login')->with('succsess', __('Berhasil Mendaftar'));
        } catch (\Throwable $th) {
            return redirect()->route('register.regis')->with('error', __($th->getMessage()));
        }
    }
}
