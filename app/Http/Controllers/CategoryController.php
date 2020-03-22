<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller {
    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'edit', 'destroy']]);
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

    public function destroy(Category $category) {
        $category->articles()->delete();
        $category->delete();
        return redirect('categories');
    }

    public function showDeleted() {
        $categories = Category::onlyTrashed()->get();
        return view('categories.manage', compact('categories'));
    }

    public function restore($category) {
        Category::onlyTrashed()->where('id', $category)->restore();
//        Category::findOrFail($category)->articles()->resotre();
        return \redirect('categories');
    }

    public function forceDelete($category) {
        Category::onlyTrashed()->where('id', $category)->forceDelete();
        return \redirect('categories');
    }
}
