<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show(User $user): array
    {
        return $this->profileResponse($user);
    }

    public function follow(User $user): array
    {
        auth()->user()->following()->attach($user->id);

        return $this->profileResponse($user);
    }

    public function unfollow(User $user): array
    {
        auth()->user()->following()->detach($user->id);

        return $this->profileResponse($user);
    }

protected function profileResponse(User $user): array
{
    
    $currentUserId = auth()->id();

  
    $following = false;
    if ($currentUserId !== null) {
        $following = $this->user->doesUserFollowAnotherUser($currentUserId, $user->id);
    }

    return [
        'profile' => $user->only('username', 'bio', 'image') + [
            'following' => $following
        ]
    ];
}


}
