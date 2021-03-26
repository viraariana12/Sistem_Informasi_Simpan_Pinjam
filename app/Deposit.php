<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable =['id_transaksi','kd_simpanan','saldo'];

    public function Transcation(){
        return $this->belongsTo('App\Transcation', 'id');
    }
    public function Detail(){
        return $this->belongsTo('App\Detail', 'id');
    }
}
