<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RouteRequest extends Request
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
            'id'      => 'min:4|max:128|string|required',
            'name'     => 'min:7|max:8|string|required|unique:routes',
            'passage'  => 'size:8|integer|unique:routes'
        ];
    }
}
