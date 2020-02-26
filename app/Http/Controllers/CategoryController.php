<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller {
    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }

    public function index() {
        $categories = Category::paginate(5);
        return view('categories.index', compact('categories'));
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(CategoryRequest $request) {
        Category::create($request->all());
        return redirect('categories');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id) {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('categories');
    }
}
