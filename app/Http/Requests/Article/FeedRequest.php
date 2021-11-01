<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class FeedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'limit' => 'sometimes|integer',
            'offset' => 'sometimes|integer'
        ];
    }
}
