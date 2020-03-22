<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        "name",
        "description"
    ];
    // Category hasMany articles
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
