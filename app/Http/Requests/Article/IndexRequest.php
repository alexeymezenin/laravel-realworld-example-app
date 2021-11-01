<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tag' => 'sometimes|string',
            'author' => 'sometimes|string',
            'favorited' => 'sometimes|string',
            'limit' => 'sometimes|integer',
            'offset' => 'sometimes|integer'
        ];
    }
}
