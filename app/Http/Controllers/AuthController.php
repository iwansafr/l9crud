<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')], $request->input('remember_me'))) {
            return redirect('/');
        }else{
            return redirect('/login')->with('message','Maaf Email dan Sandi Tidak Sesuai');
        }
    }
}
