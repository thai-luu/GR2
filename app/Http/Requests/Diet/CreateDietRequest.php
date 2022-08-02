<?php

namespace App\Http\Requests\Diet;

use Illuminate\Foundation\Http\FormRequest;

class CreateDietRequest extends FormRequest
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
            'name'=> 'required|unique:diets|string',
            'carb'=> 'required|numeric',
            'protein'=> 'required|numeric',
            'fat'=> 'required|numeric',
            'cenluloza'=> 'required|numeric',
            'mode_id' => 'required|integer',
            'range' => 'required|integer',
            'target_id' => 'required|integer'
        ];
    }
}
