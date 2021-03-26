<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable =['jml_simpan','foto','status','jenis_simpanan','id_anggota','no_transaksi'];
    public function deposit(){
        return $this->hasOne('App\Deposit', 'id_transaksi');
    }
    public function member(){
        return $this->belongsTo('App\Member', 'id');
    }
}
