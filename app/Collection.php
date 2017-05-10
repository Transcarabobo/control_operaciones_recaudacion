<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

	protected $fillable = ['despatch_id', 'amount'];

	public function despatch(){
		return $this->belongsTo('App\Despatch');
	}
}
