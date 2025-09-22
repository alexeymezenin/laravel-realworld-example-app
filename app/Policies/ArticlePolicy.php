<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ArticlePolicy
{
    /**
     * Determine whether the user can view revision history.
     */
    public function viewRevisions(User $user, Article $article): bool
    {
        Log::info("Policy check viewRevisions", [
            'user_id'       => $user->id,
            'is_admin'      => $user->is_admin ?? null,
            'article_owner' => $article->user_id,
        ]);

        return $user->id === $article->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can revert to a revision.
     */
    public function revert(User $user, Article $article): bool
    {
        Log::info("Policy check revert", [
            'user_id'       => $user->id,
            'is_admin'      => $user->is_admin ?? null,
            'article_owner' => $article->user_id,
        ]);

        return $user->id === $article->user_id || $user->is_admin;
    }
}
