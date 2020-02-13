<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        "name",
        "description"
    ];
    // Category hasMany articles
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
