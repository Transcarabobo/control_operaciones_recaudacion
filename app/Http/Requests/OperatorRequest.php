<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OperatorRequest extends Request
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
            'name'      => 'min:4|max:128|string|required',
            'cedula'    => 'min:7|max:8|string|required|unique:operators',
            'id_card'   => 'size:8|alpha_num|unique:operators'
        ];
    }
}
