<?php

namespace App\Http\Controllers;

use App\Application;
use App\Deposit;
use App\Member;
use DB;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $pinjaman = Application::with(['Member','deposit'])->get();
        
        return view('admin.validpinjaman', compact('pinjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authmember = auth()->guard('member');
        $user = $authmember->user();

        $total_saldo=0;
        foreach ($user->transaction as $transaction) {

            if ($transaction->deposit != null) {
                $total_saldo=$total_saldo + $transaction->deposit->saldo;

            }
        }
        $pinjaman = $total_saldo * 0.10;
        $data = Application::with(['member','deposit'])->where('applications.id_anggota', $user->id)->first();
        $riwayat = Application::with(['member'])->where('applications.id_anggota', $user->id)->get();
        return view('anggota.pinjaman', compact('pinjaman','data','riwayat'));
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
            'jml_pinjam'            => 'required|regex:/^[0-9]*$/',
            'jml_anggsuran'         => 'required',
        ]);
        $total = ($request->jml_pinjam * 0.5) + $request->jml_pinjam;
        $form_data = array(
            'jml_anggsuran'         =>  $request->jml_anggsuran,
            'jml_pinjam'            =>  $request->jml_pinjam,
            'bunga'                 =>  $request->bunga,
            'total'                 =>  $total,
            'id_anggota'            =>  $request->id_anggota,
            'id_simpanan'           =>  $request->id_simpanan,
            'status'                =>  $request->status,
            'keterangan'            =>  $request->keterangan,
            'pinjaman'              =>  $request->pinjaman
        );
        Application::create($form_data);
        return redirect('/anggota/pinjaman')->with('status', 'Data Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apllication  $apllication
     * @return \Illuminate\Http\Response
     */
    public function show(Apllication $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apllication  $apllication
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apllication  $apllication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
       
        $request->validate([
            'status'      => 'required'
        ]);
        Application::where('id', $application->id)
            ->update([
                'status'     => $request->status
            ]);
        return redirect('admin/validasi/application')->with('status', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apllication  $apllication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
