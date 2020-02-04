<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(5);
        return view('categories.index', compact('categories'));
    }

    public function show($id) {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }
}
