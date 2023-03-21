<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //menampilkan form untuk email dan password
    function index()
    {
        return view('sesi/index');
    }
    //Autentikasi login dari form
    //Login perlu menerima paramter dari fungsi index
    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        //jika validasi sukses, maka melakukan autentikasi
        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        //proses autentikasi
        if (Auth::attempt($infologin)) {
            //Jika autentikasi sukses
            return 'sukses';
        }
        //Autentikasi gagal
        {
            return 'gagal';
        }
    }
}
