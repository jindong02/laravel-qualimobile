<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LojaSubmenuRequest extends FormRequest
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
            'name' => 'required|unique:lojasubmenus',
            'menu_id' => 'required',
        ];

        // on update
        if ($this->isMethod('put')) {
            $rules['name'] =  [
                'required',
                Rule::unique('lojasubmenus')->ignore($this->submenu),
            ];
        }

        return $rules;
    }
}
