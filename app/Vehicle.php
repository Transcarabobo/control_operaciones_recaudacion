<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'buses';

    protected $fillable = ['id', 'product_code', 'motor_code', 'type','brand', 'model', 'year', 'vin', 'imei', 'sincard', 'line_number', 'status'];
}
