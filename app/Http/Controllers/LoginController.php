<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }
    public function loginPost(Request $request)
    {
        $auth = auth()->guard('admin');
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $validator = $request->validate(
            [
                'username'  => 'required|string|exists:admins,username|regex:/^[a-zA-Z]*$/',
                'password'  => 'required|string'
            ],
            [
                'username.requred' => 'Username Tidak Boleh Kosong',
                'username.exists'  => 'Username salah',
                'password.requred' => 'Password Tidak Boleh Kosong',
                'username.regex'   => 'Format Username Salah'
            ]
        );
                
        if ($auth->attempt($credential)) {
            $nama = $auth->user()->nama;
            return redirect('admin/dashboard')->with('status', 'Selamat Datang');
        } else {
            return redirect('admin/login');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login')->with('status', 'Anda Sudah Logout');
    }

    public function anggotaIndex()
    {
        return view('anggota.login');
    }

    
    public function anggotaLoginPost(Request $request)
    {
        $authmember = auth()->guard('member');
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $validator = $request->validate(
            [
                'username'  => 'required|string|exists:members,username|regex:/^[0-9]*$/',
                'password'  => 'required|string'
            ],
            [
                'username.requred' => 'Username Tidak Boleh Kosong',
                'username.exists'  => 'Username salah',
                'password.requred' => 'Password Tidak Boleh Kosong',
                'username.regex'   => 'Format Username Salah'
            ]
        );

        if ($authmember->attempt($credential)) {
            $nama = $authmember->user()->nama;
            return redirect('anggota/dashboard')->with('status', 'Selamat Datang');
        } else {
            return redirect('anggota/login');
        }
    }
    public function anggotaLogout()
    {
       Auth::guard('member')->logout();
        return redirect('anggota/login')->with('status', 'Anda Sudah Logout');
    }
}
