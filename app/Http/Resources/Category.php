<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Article as ArticleResource;

class Category extends JsonResource {
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
            'description' => $this->description,
            'articles' => $this->when($request->get('include') == 'articles', ArticleResource::collection($this->articles)),
        ];
    }
}
