<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
	protected $table = 'operators';

	protected $fillable = ['id_card', 'cedula', 'name'];
}
