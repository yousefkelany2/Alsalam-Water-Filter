<?php

namespace App\Http\Controllers\Website\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Dashboard\Category\Category;
use Illuminate\Http\Request;

class PublicCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'active')
            ->withCount(['products' => function ($query) {
                $query->where('status', 'active');
            }])
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Categories retrieved successfully',
            'data'    => CategoryResource::collection($categories),
        ], 200);
    }

    public function show(string $id)
    {
        $category = Category::where('status', 'active')->find($id);

        if (!$category) {
            return response()->json(['status' => false, 'message' => 'Category not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Category retrieved successfully',
            'data'    => new CategoryResource($category),
        ], 200);
    }
}
