<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Detail;
use App\Member;
use Illuminate\Http\Request;
use DB;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $transaction=DB::table('transactions')
                            ->join('members','transactions.id_anggota', '=', 'members.id')
                            ->select('members.*','transactions.*')
                            ->get();
        return view('admin.validsetoran', compact('transaction'));
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
        $jenis = Detail::all();
        // $transaksi =DB::table('transactions')
        // ->join('members','transactions.id_anggota', '=', 'members.id')
        // ->where()
        // ->select('members.*','transactions.*')
      
        $transaksi = Transaction::with('Member')->where('transactions.id_anggota', $user->id)->get();
        return view('anggota.setoran', compact('jenis','user','transaksi'));
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
            'jml_simpan'         => 'required|regex:/^[0-9]*$/',
            'jenis_simpanan'     => 'required',
            'foto'               => 'required|image:jpeg,jpg,png'
        ]);

        $path = $request->file('foto')->store('foto/Bukti Transfer');
        $form_data = array(
            'jenis_simpanan'        =>  $request->jenis_simpanan,
            'jml_simpan'            =>  $request->jml_simpan,
            'id_anggota'            =>  $request->id_anggota,
            'status'                =>  $request->status,
            'foto'                  =>  $path
        );
        Transaction::create($form_data);
        return redirect('/anggota/setoran')->with('status', 'Data Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status'      => 'required'
        ]);
        Transaction::where('id', $transaction->id)
            ->update([
                'status'     => $request->status
            ]);
        return redirect('admin/validasi/transaction')->with('status', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
