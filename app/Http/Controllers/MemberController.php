<?php

namespace App\Http\Controllers;

use App\Member;
use App\Registration;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = DB::table('registrations')
                    ->join('members', 'registrations.id', '=', 'members.pendaftaran_id')
                    ->select('registrations.ktp', 'members.*')
                    ->get();
        return view('admin.anggota', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              
        Member::create([
            'username' => $request->username,
            'pendaftaran_id' => $request->pendaftaran_id,
            'password' => Hash::make($request->password),
            'nama'          =>  $request->nama,
            'nip'           =>  $request->username,
            'alamat'        =>  $request->alamat,
            'status'        =>  $request->status,
            'email'         =>  $request->email,
            'sekolah'       =>  $request->sekolah,
            'no_ponsel'     =>  $request->no_ponsel,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'agama'         =>  $request->agama,
        ]);
            return redirect('/admin/manajemen/member')->with('status', 'Data Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $authmember = auth()->guard('member');
        $user = $authmember->user();
        return view('anggota.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $authmember = auth()->guard('member');
        $user = $authmember->user();

        if ($request->filled('password')) {
            $user->update([
                'password'  => Hash::make($request->password),
            ]);
        } else {
            $user->update($request->except('password'));
        }

        return redirect('anggota/profile')->with('status', 'Data Berhasil di Ubah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'username'      => 'required',
            'nama'          => 'required|regex:/[a-zA-Z]/',
            'nip'           => 'required|regex:/^[0-9]*$/',
            'alamat'        => 'required',
            'email'         => 'required',
            'sekolah'       => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'no_ponsel'     => 'required|regex:/^[0-9]*$/',
        ]);
        if ($request->filled('password')) {
    
            $member->update([
                'username'  => $request->username,
                'nama'      => $request->nama,
                'password'  => Hash::make($request->password),
            ]);
        } else {
         
            $member->update($request->except('password'));
        }
        return redirect('admin/manajemen/member')->with('status', 'Data Berhasil di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
