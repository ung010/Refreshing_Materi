<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function index() {
        return view('login.index');
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){

            if (Auth::user()->role == 'users'){
                return redirect('/home/users');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('/home/admin');
            } elseif (Auth::user()->role == 'manager') {
                return redirect('/home/manager');
            }
        }else{
            return redirect('/login')->withErrors('Penulisan email dan password ada kesalahan')->withInput();
        };     
    }

    function logout() {
        Auth::logout();
        return redirect('');
    }

    function register() {
        return view('register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->input('name'));
        Session::flash('id_users', $request->input('id_users'));
        Session::flash('email', $request->input('email'));

        $request->validate([
            'name' => 'required',
            'id_users' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama wajib diisi',
            'id_users.required' => 'NIM wajib diisi',
            'id_users.unique' => 'NIM sudah digunakan, silakan masukkan NIM yang lain',
            'email.email' => 'Email harus valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        $data = [
            'name' => $request->name,
            'id_users' => $request->id_users,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $inforegister = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($inforegister)) {
            return redirect('/')->with('success Berhasil Register Akun');
        } else {
            return redirect('/register')->withErrors('Email atau password yang dimasukkan tidak sesuai');
        }
    }
}
