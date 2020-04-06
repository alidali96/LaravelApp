<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag as TagResource;

class Article extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {
        return [
            'name' => $this->name,
            'body' => $this->body,
            'tags' => TagResource::collection($this->tags),
        ];
    }
}
