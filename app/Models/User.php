<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = ['username', 'email', 'password', 'bio', 'images'];

    protected $visible = ['username', 'email', 'bio', 'images'];

    public function getRouteKeyName(): string
    {
        return 'username';
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function favoritedArticles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

    public function doesUserFollowAnotherUser(int $followerId, int $followingId): bool
    {
        return $this->where('id', $followerId)->whereRelation('following', 'id', $followingId)->exists();
    }

    public function doesUserFollowArticle(int $userId, int $articleId): bool
    {
        return $this->where('id', $userId)->whereRelation('favoritedArticles', 'id', $articleId)->exists();
    }

    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
