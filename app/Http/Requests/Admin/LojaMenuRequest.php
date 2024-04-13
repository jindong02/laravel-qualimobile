<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LojaMenuRequest extends FormRequest
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
        $rules = [
            'name' => 'required|unique:lojamenus',
            'categoria_id' => 'required_with:is_single',
        ];

        // on update
        if ($this->isMethod('put')) {
            $rules['name'] =  [
                'required',
                Rule::unique('lojamenus')->ignore($this->menu),
            ];
        }

        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.categoria_id.required_with' => 'O campo da categoria do produto é obrigatório.'
        ];
    }
}
