<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Category hasMany articles
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
