<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Deposit;
use App\Member;
use App\Application;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
        $pendaftaran = Registration::count();
        $anggota = Member::count();
        $simpanan    = Deposit::sum('saldo');
        $pinjaman    = Application::where('status', 'Berhasil')->sum('total');
        $pengajuan   = Application::count();
        $pengajuan_berhasil   = Application::where('status', 'Berhasil')->count();
         return view('admin.dashboard', compact('pendaftaran','simpanan','anggota','pinjaman','pengajuan','pengajuan_berhasil'));
    }

    public function dashboardAnggota()
    {
        $authmember = auth()->guard('member');
        $user = $authmember->user();
        $total_saldo=0;
        foreach ($user->transaction as $transaction) {

            if ($transaction->deposit != null) {
                $total_saldo=$total_saldo + $transaction->deposit->saldo;
            }
        }

        $total_pinjaman = $user->application()->where('status', 'Berhasil')->sum('total');
   
       return view('anggota.dashboard', compact('total_saldo','total_pinjaman'));   
    }
}