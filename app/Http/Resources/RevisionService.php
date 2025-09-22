<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RevisionService extends ResourceCollection
{
    public static $wrap = '';

    public function toArray($request): array
    {
         return [
            'id' => $this->id,
            'revision' => $this->revision,
            'article_id' => $this->article_id,
            'created_at' => $this->created_at,
        ];
    }
}
