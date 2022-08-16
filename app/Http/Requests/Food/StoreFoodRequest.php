<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
            'name' => 'required|string',
            'carb' => 'required|numeric',
            'protein' => 'required|numeric',
            'fat' => 'required|numeric',
            'cenluloza' => 'required|numeric',
            'trans' => 'required|numeric',
            'cholesteron' => 'required|numeric',
            'sodium' => 'required|numeric',
            'calo' => 'required|numeric',
            'classify_id' => 'required|integer',
        ];
    }
}
