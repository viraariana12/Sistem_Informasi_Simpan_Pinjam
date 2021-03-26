<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function index()
   {
       return view('home');
   }
   public function pendaftaran()
   {
       return view('daftar');
   }
   public function profile()
   {
       return view('profile');
   }
   public function vSetoran()
   {
       return view('admin.validsetoran');
   }
   public function vPinjaman()
   {
       return view('admin.validpinjaman');
   }
   public function anggota()
   {
       return view('admin.anggota');
   }
   public function setoran()
   {
       return view('anggota.setoran');
   }
   public function pinjaman()
   {
       return view('anggota.pinjaman');
   }
}
