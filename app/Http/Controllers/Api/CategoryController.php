<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller {

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $sortColumn = $request->input('sort', 'id');
        $sortDirection = starts_with($sortColumn, '-') ? 'desc' : 'asc';
        $sortColumn = ltrim($sortColumn, '-');

        $query = Category::query();
        $query->when($request->filled('filter'), function ($query) {
            $filters = explode(',', request('filter'));
            foreach ($filters as $filter) {
                [$criteria, $value] = explode(':', $filter);
                $query->where($criteria, $value);
            }
            return $query;
        });

//        return $query->orderBy($sortColumn, $sortDirection)->paginate(3);
        return CategoryResource::collection($query->orderBy($sortColumn, $sortDirection)->paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request) {
        try {
            $category = Category::create($request->all());
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Could not create Category',
                    'detail' => $e->getMessage(),
                    'code' => 3,
                ]
            ], 400);
        }
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        try {
            $category = Category::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Could not find Category',
                    'detail' => $e->getMessage(),
                    'code' => 4,
                ]
            ], 404);
        }
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id) {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Could not update Category',
                    'detail' => $e->getMessage(),
                    'code' => 2,
                ]
            ], 404);
        }
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
        }catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Could not delete Category',
                    'detail' => $e->getMessage(),
                    'code' => 1,
                ]
            ], 404);
        }

        return response()->json(null,204);
    }
}
