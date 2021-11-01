<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route('comment')->user->id === auth()->id();
    }

    public function rules(): array
    {
        return [];
    }
}
