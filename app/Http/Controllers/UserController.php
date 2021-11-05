<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show(): array
    {
        return $this->userResource(auth()->getToken()->get());
    }

    public function store(StoreRequest $request): array
    {
        $user = $this->user->create($request->validated()['user']);

        auth()->login($user);

        return $this->userResource(auth()->refresh());
    }

    public function update(UpdateRequest $request): array
    {
        auth()->user()->update($request->validated()['user']);

        return $this->userResource(auth()->getToken()->get());
    }

    public function login(LoginRequest $request): array
    {
        if ($token = auth()->attempt($request->validated()['user'])) {
            return $this->userResource($token);
        }

        abort(Response::HTTP_FORBIDDEN);
    }

    protected function userResource(string $jwtToken): array
    {
        return ['user' => ['token' => $jwtToken] + auth()->user()->toArray()];
    }
}
