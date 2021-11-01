<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route('article')->user->id === auth()->id();
    }

    public function rules(): array
    {
        return [];
    }
}
