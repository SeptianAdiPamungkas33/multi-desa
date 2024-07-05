<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('auth.login', [
                'title' => 'Login'
            ]);
        }

        if (!auth()->check() || auth()->user()->role_id != 1) {
            abort(403);
        }
    }

    public function prosesLogin(Request $request)
    {
        // dd($request->all());

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            return redirect('home');
        } else {
            Session::flash('error', 'Username atau Password Salah');
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function home()
    {
        return view('index');
    }
}
