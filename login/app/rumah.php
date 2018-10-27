<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rumah extends Model
{
    //
	public $table = "rumah";
	protected $primaryKey = 'idrumah';
	public $incrementing = false;

	protected $fillable = [
	'idrumah','alamat','uuid','mac'
];
	public function akun_pelanggans()
	{
		return $this->hasMany('App\akun_pelanggan', 'idrumah_fk', 'idrumah');
	}
}
