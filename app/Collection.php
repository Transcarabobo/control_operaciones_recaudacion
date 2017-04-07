<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

	protected $fillable = ['part_id', 'rode'];

	public function part(){
		return $this->belongsTo('App\Part');
	}
}
