<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'nama'      => 'required|regex:/[a-zA-Z]/',
            'password'  => 'required|min:6',
            'email'     => 'required',
            'level'     => 'required'
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'level' => $request->level,
        ]);
        return redirect('admin/manajemen/admin')->with('status', 'Data Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $auth = auth()->guard('admin');
        $user = $auth->user();
        return view('admin.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request )
    {
        $auth = auth()->guard('admin');
        $user = $auth->user();

        if ($request->filled('password')) {
            $user->update([
                'username'  => $request->username,
                'nama'      => $request->nama,
                'password'  => Hash::make($request->password),
                'email'     => $request->email
            ]);
        } else {
            $user->update($request->except('password'));
        }

        return redirect('admin/profile')->with('status', 'Data Berhasil di Ubah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'username'  => 'required',
            'nama'      => 'required',
            'level'     => 'required'
        ]);
        if ($request->filled('password')) {
    
            $admin->update([
                'username'  => $request->username,
                'nama'      => $request->nama,
                'password'  => Hash::make($request->password),
            ]);
        } else {
         
            $admin->update($request->except('password'));
        }
        return redirect('admin/manajemen/admin')->with('status', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        Admin::destroy($admin->id);
        return redirect('admin/manajemen/admin')->with('status', 'Data Berhasil di Hapus');
    }
}
