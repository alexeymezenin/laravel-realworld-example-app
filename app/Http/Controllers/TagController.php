<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index(Tag $tag): array
    {
        return ['tags' => $tag->pluck('name')];
    }
}
