<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public static $wrap = 'comment';

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'body' => $this->body,
            'author' => [
                'username' => $this->user->username,
                'bio' => $this->user->bio,
                'image' => $this->user->image,
                'following' => $this->user->followers->contains(auth()->id())
            ]
        ];
    }
}
