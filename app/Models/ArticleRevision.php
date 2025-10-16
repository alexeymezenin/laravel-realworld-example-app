<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleRevision extends Model
{
     protected $fillable = [
        'article_id',
        'user_id',
        'title',
        'slug',
        'description',
        'body',
        'meta',
    ];


       protected $casts = [
        'meta' => 'array',
    ];

    public function article()
    {
            return $this->belongsTo(Article::class);
    }
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
