<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Register;
use App\Mail\LupaPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class LupaPasswordController extends Controller
{
    public function formLupaPassword(){
        return view('form-lupa-password');
    }

    public function prosesLupaPassword(Request $req){
        $this->validate($req, [
            'email' => 'required|string|email',
        ]);

        try {
            $datas = $req->all();
            //cek email terdapa di db atau tidak
            $getData = Register::where('email', $datas['email'])->first();
            if (empty($getData)) {
                return redirect()->route('forgot.form-forgot')->with('error', __('Email Salah'));
            }

            //proses pembuatan token untuk lupa password
            $token = Str::random(54);

            //proses cek ke tabel PasswordResetTokens
            $dataPasswordResetTokens = PasswordResetTokens::where('email', $datas['email'])->first();
            if(!empty($dataPasswordResetTokens)){
                PasswordResetTokens::where('email', $datas['email'])->delete();
            }

            //proses input token reset pasword
            $datasToken = new PasswordResetTokens;
            $datasToken->email = $datas['email'];
            $datasToken->token = $token;
            $datasToken->created_at = date('Y-m-d H:i:s');
            $datasToken->save();

             //proses pembuatan parameter untuk dikirim ke email
             $dataEmail = [
                'nama_pengguna' => $getData->name,
                'url_reset' => env('APP_URL') . '/forgot/reset-password/' . $token,
            ];
         
       //proses kirim email
       Mail::to($datas['email'])->send(new LupaPasswordMail($dataEmail));
        
        return redirect()->route('forgot.form-forgot')->with('error', __('Silahkan periksa Email anda'));
       
     }catch(\Throwable $th) {
        return redirect()->route('forgot.form-forgot')->with('error', __($th->getMessage()));
        }

    }

        public function resetPassword($token)
    {
        //cek data by token untuktgl hari ini
        $dataReset = passwordResetTokens::where('token', $token)->whereDate('created_at', '=', date('Y-m-d'))->first();
        if (empty($dataReset)) {
            return redirect()->route('forgot.form-forgot')->with('error', __('Token tidak valid'));
        }
        $token = $token;
        $email = $dataReset->email;

        //proses menampilkan form reset password
        return view('form_atur_ulang_password', compact('email', 'token'));
    }

     public function prosesResetPassword(Request $req)
    {
        //validasi password baru
        $this->validate($req, [
            'password' => 'required|string|min:8|confirmed',
        ]);

        $datas = $req->all();
        //proses update password
        Register::where('email', $datas['email'])->update([
            'password' => Hash::make($datas['password'])
        ]);

        //proses hapus ke tabel reset password by email
        passwordResetTokens::where('email', $datas['email'])->delete();

        return redirect()->route('login.login')->with('success', __('Reset password sukses'));
    }

}