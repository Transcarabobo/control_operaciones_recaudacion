<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despatch extends Model
{
    protected $table = 'parts';

	protected $fillable = ['route_id', 'operator_id', 'unidad_id','date','observations'];

	public function route(){
		return $this->belongsTo('App\Route');
	}

	public function operator(){
		return $this->belongsTo('App\Operator');
	}

  	public function vehicle(){
		return $this->belongsTo('App\Vehicle');
	}

	public function collection(){
		return $this->hasOne('App\Collection');
	}
}
