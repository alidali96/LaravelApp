<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index() {
        $testing = "Passing data...";
        $articles = DB::table('articles')->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article) {
//        $article = Article::findOrFail($article);
        return view('articles.show', compact('article'));
    }
}
