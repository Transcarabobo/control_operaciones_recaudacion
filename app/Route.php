<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

	protected $fillable = ['id', 'name', 'passage'];

	public function part(){
		return $this->hasMany('App\Part');
	}
}
