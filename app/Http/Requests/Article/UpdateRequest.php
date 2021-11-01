<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route('article')->user->id === auth()->id();
    }

    public function rules(): array
    {
        return [
            'article.title' => 'sometimes|string|max:255',
            'article.description' => 'sometimes|string|max:255',
            'article.body' => 'sometimes|string|max:2048',
            'article.tagList' => 'sometimes|array',
            'article.tagList.*' => 'sometimes|string|max:255'
        ];
    }
}
