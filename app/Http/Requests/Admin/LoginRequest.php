<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'login' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function authenticate() {
        if (!Auth::attempt($this->only('login', 'password'))) {

            throw ValidationException::withMessages([
                'login' => "Essas credenciais não foram encontradas em nossos registros.",
            ]);
        }
    }

}
