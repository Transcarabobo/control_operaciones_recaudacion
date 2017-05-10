<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
	protected $table = 'operators';

	protected $fillable = ['id_card', 'cedula', 'name'];

	public function despatch(){
		return $this->hasMany('App\Despatch');
	}
}
