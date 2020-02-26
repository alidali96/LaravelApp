<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

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
        $categories = Category::all()->pluck('name', 'id');
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required'
        ]);
        $category = Category::findOrFail($request->category_id);
        $article = new Article($request->all());
        $article->author_id = 1;
        $article->category()->associate($category)->save();
        return redirect()->route('articles.show', ['article'=> $article->id]);
    }

    public function getArticle(Request $request) {
        $name = $request->get('name');
        $body = $request->get('body');

        $articles = Article::where('name', 'like', "%{$name}%")
                            ->where('body', 'like', "%{$body}%")
                            ->get();

        return Response::json([
            'data' => $articles
        ]);
    }
}
