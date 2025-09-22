<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RevisionCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
         $firstRevision = $this->collection->first();

        return [
            'user' => [
                'id' => $firstRevision?->user->id,
                'username' => $firstRevision?->user->username,
            ],
            'revisions' => RevisionResource::collection($this->collection),
        ];
    }
}
