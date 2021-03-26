<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $fillable =['id_anggota','id_simpanan','jml_pinjam','bunga','total','status','jml_anggsuran','keterangan','pinjaman'];

    public function Transcation(){
        return $this->belongsTo('App\Transcation', 'id');
    }
    public function Detail(){
        return $this->belongsTo('App\Detail', 'id');
    }

    public function deposit(){
        return $this->belongsTo('App\Deposit', 'id_simpanan');
    }
    public function member(){
        return $this->belongsTo('App\Member', 'id_anggota');
    }
}
