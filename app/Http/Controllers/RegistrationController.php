<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registration = Registration::orderBy('id', 'desc')->get();
        return view('admin.pendaftaran', compact('registration'));
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
            'nama'          => 'required|regex:/[a-zA-Z]/',
            'nip'           => 'required|regex:/^[0-9]*$/',
            'alamat'        => 'required',
            'email'         => 'required',
            'status'        => 'required',
            'sekolah'       => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'no_ponsel'     => 'required|regex:/^[0-9]*$/',
            'ktp'           => 'required|image:jpeg,jpg,png'
        ]);

        $path = $request->file('ktp')->store('foto/ktp');
        $form_data = array(
            'nama'          =>  $request->nama,
            'nip'           =>  $request->nip,
            'alamat'        =>  $request->alamat,
            'status'        =>  $request->status,
            'email'         =>  $request->email,
            'sekolah'       =>  $request->sekolah,
            'no_ponsel'     =>  $request->no_ponsel,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'agama'         =>  $request->agama,
            'ktp'           =>  $path
        );
        Registration::create($form_data);
        return redirect('/pendaftaran')->with('status', 'Data Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'status'      => 'required'
        ]);
        Registration::where('id', $registration->id)
            ->update([
                'status'     => $request->status
            ]);
        return redirect('admin/manajemen/registration')->with('status', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        Registration::destroy($registration->id);
        return redirect('admin/manajemen/registration')->with('status', 'Data Berhasil di Hapus');
    }
}
