<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Tag;

class ArticleService
{
    protected Article $article;
    protected Tag $tag;

    public function __construct(Article $article, Tag $tag)
    {
        $this->article = $article;
        $this->tag = $tag;
    }

    public function syncTags(Article $article, array $tags): void
    {
        $tagsIds = [];

        foreach ($tags as $tag) {
            $tagsIds[] = $this->tag->firstOrCreate(['name' => $tag])->id;
        }

        $article->tags()->sync($tagsIds);
    }
}
