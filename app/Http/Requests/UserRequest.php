<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'email'     => 'min:12|max:128|required|email|unique:users',
            'password'  => 'min:8|max:32|alpha_dash|required',
            'access'    => 'required'
        ];
    }
}
