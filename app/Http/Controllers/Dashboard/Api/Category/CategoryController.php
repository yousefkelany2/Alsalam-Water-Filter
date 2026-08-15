<?php

namespace App\Http\Controllers\Dashboard\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Dashboard\Category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('products')->latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Categories retrieved successfully',
            'data'    => CategoryResource::collection($categories),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Category created successfully',
            'data'    => new CategoryResource($category),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found',
            ], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Category retrieved successfully',
            'data'    => new CategoryResource($category),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found',
            ], 404);
        }

        $category->update($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Category updated successfully',
            'data'    => new CategoryResource($category),
        ], 200);
    }

    /**
     * Remove the specified resource from storage (Soft Delete).
     */
    public function softDelete(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found',
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Category soft deleted successfully',
        ]);
    }

    /**
     * Permanently remove the specified resource.
     */
    public function forceDelete(string $id)
    {
        $category = Category::withTrashed()->find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found',
            ], 404);
        }

        $category->forceDelete();

        return response()->json([
            'status'  => true,
            'message' => 'Category permanently deleted',
        ]);
    }

    /**
     * Get all soft deleted resources.
     */
    public function trashed()
    {
        $categories = Category::onlyTrashed()->latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Trashed categories retrieved successfully',
            'data'    => CategoryResource::collection($categories),
        ], 200);
    }

    /**
     * Restore the specified soft deleted resource.
     */
    public function restore(string $id)
    {
        $category = Category::withTrashed()->find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found',
            ], 404);
        }

        if (!$category->trashed()) {
            return response()->json([
                'status'  => false,
                'message' => 'Category is not deleted',
            ], 400);
        }

        $category->restore();

        return response()->json([
            'status'  => true,
            'message' => 'Category restored successfully',
        ]);
    }
}
