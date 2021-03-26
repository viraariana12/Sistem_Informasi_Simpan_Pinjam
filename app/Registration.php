<?php
  
namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable =['nama','nip','alamat','email','status','sekolah','ktp','no_ponsel','jenis_kelamin','agama'];
}
