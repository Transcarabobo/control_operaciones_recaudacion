<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VehicleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'            => 'between:9400,9599|integer|required',
            'product_code'  => 'size:11|alpha_num|required|unique:buses',
            'motor_code'    => 'min:8|max:11|alpha_num|required|unique:buses',
            'type'          => 'required',
            'brand'         => 'required',
            'model'         => 'required',
            'year'          => 'integer|required',
            'vin'           => 'size:17|alpha_num|required|unique:buses',
            'imei'          => 'size:15|alpha_num|required|unique:buses',
            'status'        => 'required'
        ];
    }
}
