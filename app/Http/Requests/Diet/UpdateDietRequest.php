<?php

namespace App\Http\Requests\Diet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDietRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('id');

        return [
            'name'=> 'required|string|unique:diets,name,'.$id,
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
