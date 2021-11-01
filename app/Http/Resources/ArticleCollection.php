<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    public static $wrap = '';

    public function toArray($request): array
    {
        return [
            'articles' => $this->collection,
            'articlesCount' => $this->count()
        ];
    }
}
