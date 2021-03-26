<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notification\Notifale;

class Member extends Authenticable
{
    protected $fillable =['username','password','pendaftaran_id','nama','alamat','email','nip','sekolah','no_ponsel','jenis_kelamin','agama'];

    public function registration(){
        return $this->belongsTo('App\Registration', 'id');
    }

    public function deposits(){
        return $this->belongsTo('App\Deposit', 'id');
    }
    public function transaction(){
        return $this->hasMany('App\Transaction', 'id_anggota');
    }
    public function application(){
        return $this->hasMany('App\Application', 'id_anggota');
    }
}
