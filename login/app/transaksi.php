<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    //
	public $table = "transaksi";
	protected $primaryKey = 'iduser_tr';
	public $incrementing = false;

	protected $fillable = [
	'iduser_tr','file'];

	public function akun_pelanggan()
	{
		return $this->belongsTo('App\akun_pelanggan', 'iduser_tr', 'iduser');
	}
}
