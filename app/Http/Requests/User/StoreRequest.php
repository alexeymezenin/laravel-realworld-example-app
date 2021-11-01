<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user.username' => 'required|string|max:50|unique:users,username',
            'user.email' => 'required|email|max:255|unique:users,email',
            'user.password' => 'required'
        ];
    }
}
