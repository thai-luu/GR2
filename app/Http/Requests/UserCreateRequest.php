<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|string|unique:users',
            'age' => 'required|integer',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'level_id' => 'required|integer',
            'height' => 'required|numeric',
            'sex' => 'required|integer',
            'target_id' => 'required|integer',
            'weight' => 'required|numeric',
            'wrist' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Name already exists',
            'email.unique' => 'Email already exists',
        ];
    }
}
