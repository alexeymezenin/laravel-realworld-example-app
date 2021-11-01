<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user.username' => 'sometimes|string|max:50|unique:users,username',
            'user.email' => 'sometimes|email|max:255|unique:users,email',
            'user.password' => 'sometimes',
            'user.image' => 'sometimes|url',
            'user.bio' => 'sometimes|string|max:2048'
        ];
    }
}
