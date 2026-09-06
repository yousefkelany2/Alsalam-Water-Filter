<?php

namespace App\Http\Controllers\Website\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Dashboard\Product\Product;
use Illuminate\Http\Request;

class PublicProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('status', 'active')
            ->with(['category'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('name_ar', 'like', "%{$search}%")
                  ->orWhereHas('category', function ($catQ) use ($search) {
                      $catQ->where('name', 'like', "%{$search}%")
                           ->orWhere('name_ar', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('minPrice')) {
            $query->where('price', '>=', $request->minPrice);
        }
        if ($request->filled('maxPrice')) {
            $query->where('price', '<=', $request->maxPrice);
        }
        if ($request->filled('inStockOnly') && $request->inStockOnly == 'true') {
            $query->where('in_stock', true);
        }
        if ($request->filled('featured') && $request->featured == 'true') {
            $query->where('featured', true);
        }
        if ($request->filled('minRating')) {
            $query->having('reviews_avg_rating', '>=', $request->minRating);
        }

        $sort = $request->sort ?? 'newest';
        switch ($sort) {
            case 'priceLowHigh':
                $query->orderBy('price', 'asc');
                break;
            case 'priceHighLow':
                $query->orderBy('price', 'desc');
                break;
            case 'topRated':
                $query->orderBy('reviews_avg_rating', 'desc');
                break;
            case 'bestSelling':
                $query->orderBy('sales_count', 'desc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $pageSize = $request->pageSize ?? 12;
        $products = $query->paginate($pageSize);

        return response()->json([
            'data' => ProductResource::collection($products->items()),
            'meta' => [
                'currentPage' => $products->currentPage(),
                'totalPages'  => $products->lastPage(),
                'totalItems'  => $products->total(),
                'pageSize'    => $products->perPage(),
                'hasNext'     => $products->hasMorePages(),
                'hasPrev'     => $products->currentPage() > 1,
            ]
        ], 200);
    }

    public function show(string $id)
    {
        $product = Product::where('status', 'active')
            ->with(['category', 'reviews' => function($q) {
                $q->where('status', 'approved');
            }])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->find($id);

        if (!$product) {
            return response()->json(['status' => false, 'message' => 'Product not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Product retrieved successfully',
            'data'    => new ProductResource($product),
        ], 200);
    }

    public function related(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['status' => false, 'message' => 'Product not found'], 404);
        }

        $related = Product::where('status', 'active')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->take(4)
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Related products retrieved successfully',
            'data'    => ProductResource::collection($related),
        ], 200);
    }
}
