<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'buses';

    protected $fillable = ['id', 'product_code', 'motor_code', 'type','brand', 'model', 'year', 'vin', 'imei', 'sincard', 'line_number', 'status'];

    public function despatch(){
  		return $this->hasMany('App\Despatch');
  	}

    public function scopeSearch($query, $id){
      return $query->where('id', 'LIKE', "%$id%");
    }
}
