<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class akun_pelanggan extends Model
{
    //
	public $table = "akun_pelanggan";
	protected $primaryKey = 'iduser';
	public $incrementing = false;

	protected $fillable = [
	'iduser','user','password','jarak','idrumah_fk','email','pro', 'user_id'];

	public function transaksis()
	{
		return $this->hasMany('App\transaksi', 'iduser_tr', 'iduser');
	}

	public function rumah()
	{
		return $this->belongsTo('App\rumah', 'idrumah_fk', 'idrumah');
	}

	public function userlogin()
	{
		return $this->belongsTo('App\User');
	}
}
