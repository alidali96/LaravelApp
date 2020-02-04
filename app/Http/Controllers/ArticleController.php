<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{

    public function index() {
        $testing = "Passing data...";
//        $articles = DB::table('articles')->get();
        $articles = Article::paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article) {
//        $article = Article::findOrFail($article);
        return view('articles.show', compact('article'));
    }

    public function create() {
        return view('articles.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required'
        ]);


        $article = new Article();
        $article->name = $request->input('name');
        $article->body = $request->input('body');
        $article->author_id = 1;
        $article->category_id = 1;
        $article->save();
//        dd($article);
//        return redirect()->route('articles.show', ['article'=> $article->id]);
        return Redirect::route('articles.show', ['article'=> $article->id]);

    }
}
