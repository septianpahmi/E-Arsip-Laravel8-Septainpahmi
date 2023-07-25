<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

class SesiController extends Controller
{
    function index(){
        return view('auth.login');
    }
    function login(Request $request){
        $request->validate([
            'email' => 'required|max:30',
            'password' => 'required|min:8',
        ],[
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi'
        ]);
        $infologin=[
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($infologin)){
            if(Auth::user()->role=='admin'){
                return redirect('/arsip');
            }elseif(Auth::user()->role=='guru'){
                return redirect('/arsip');
            }elseif(Auth::user()->role=='siswa'){
                return redirect('/arsip');
            }
        }
        else{
            return redirect ('')->withErrors('Email atau Password salah')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
