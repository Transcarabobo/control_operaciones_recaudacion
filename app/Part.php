<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';

	protected $fillable = ['route_id', 'operator_id', 'id_unidad','date','observations'];

	public function route(){
		return $this->belongsTo('App\Route');
	}

	public function operator(){
		return $this->belongsTo('App\Operator');
	}

	public function collection(){
		return $this->hasOne('App\Collection');
	}
}
