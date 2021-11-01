<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public static $wrap = 'article';

    public function toArray($request): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'tagList' => $this->tags->pluck('name'),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'favoritesCount' => (int) $this->users_count,
            'favorited' => $this->users->contains(auth()->id()),
            'author' => [
                'username' => $this->user->username,
                'bio' => $this->user->bio,
                'image' => $this->user->image,
                'following' => $this->user->followers->contains(auth()->id())
            ]
        ];
    }
}
