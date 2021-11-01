<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'body'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getFiltered(array $filters): Collection
    {
        return $this->when(array_key_exists('tag', $filters), function ($q) use ($filters) {
            $q->whereRelation('tags', 'name', $filters['tag']);
        })
        ->when(array_key_exists('author', $filters), function ($q) use ($filters) {
            $q->whereRelation('user', 'username', $filters['author']);
        })
        ->when(array_key_exists('favorited', $filters), function ($q) use ($filters) {
            $q->whereRelation('users', 'username', $filters['favorited']);
        })
        ->when(array_key_exists('offset', $filters), function ($q) use ($filters) {
            $q->offset($filters['offset'])->limit($filters['limit']);
        })
        ->with('user', 'users', 'tags', 'user.followers')
        ->get();
    }

    public function setTitleAttribute(string $title): void
    {
        $this->attributes['title'] = $title;

        $this->attributes['slug'] = Str::slug($title);
    }
}
