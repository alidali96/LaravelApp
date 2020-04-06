<?php

namespace App\Http\Controllers\Api;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $sortColumn = $request->input('sort', 'id');
        $sortDirection = starts_with($sortColumn, '-') ? 'desc' : 'asc';
        $sortColumn = ltrim($sortColumn, '-');

        $query = Article::query();
        $query->when($request->filled('filter'), function ($query) {
            $filters = explode(',', request('filter'));

            foreach ($filters as $filter) {
                [$criteria, $value] = explode(':', $filter);
                $query->where($criteria, $value);
            }
            return $query;
        });

//        return $query->orderBy($sortColumn, $sortDirection)->paginate(10);
        return ArticleResource::collection($query->orderBy($sortColumn, $sortDirection)->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $article = Article::create($request->all());
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Could not create Article',
                    'detail' => $e->getMessage(),
                    'code' => 3,
                ]
            ], 400);
        }

        return new ArticleResource($article);
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
            $article = Article::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Could not find Article',
                    'detail' => $e->getMessage(),
                    'code' => 4,
                ]
            ], 404);
        }
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            $article = Article::findOrFail($id);
            $article->update($request->all());
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Could not update Article',
                    'detail' => $e->getMessage(),
                    'code' => 2,
                ]
            ], 404);
        }

        return new ArticleResource($article);
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
            $article = Article::findOrFail($id);
            $article->delete();
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Could not delete Article',
                    'detail' => $e->getMessage(),
                    'code' => 1,
                ]
            ], 404);

            return response()->json(null, 204);
        }
    }
}
