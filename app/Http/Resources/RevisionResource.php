<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RevisionResource extends JsonResource
{
    public static $wrap = '';

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' =>  $this->slug,
            'description'=>$this->description,
            'body'=>$this->body,
            'created_at' => $this->created_at,
        ];
    }
}
