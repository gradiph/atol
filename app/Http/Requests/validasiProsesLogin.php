<?php

namespace Mobilocator\Http\Requests;

use Mobilocator\Http\Requests\Request;

class validasiProsesLogin extends Request
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
            'username'=>'required|exists:users,username',
			'password'=>'required'
        ];
    }
	public function messages()
	{
		return [
			'username.required'=>'harus mengisi username',
			'username.exists'=>'username tidak terdaftar',
			'password.required'=>'harus mengisi password',
		];
	}
}
