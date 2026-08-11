<?php

namespace App\Http\Controllers\Dashboard\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();

        return response()->json([
            'status'  => true,
            'message' => 'Products retrieved successfully',
            'data'    => ProductResource::collection($products),
        ], 200);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->createProduct(
            $request->validated(),
            $request->file('image'),
            $request->file('gallery')
        );

        return response()->json([
            'status'  => true,
            'message' => 'Product created successfully',
            'data'    => new ProductResource($product),
        ], 201);
    }

    public function show(string $id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return response()->json(['status' => false, 'message' => 'Product not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Product retrieved successfully',
            'data'    => new ProductResource($product),
        ], 200);
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $product = $this->productService->updateProduct(
            $id,
            $request->validated(),
            $request->file('image'),
            $request->file('gallery')
        );

        if (!$product) {
            return response()->json(['status' => false, 'message' => 'Product not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Product updated successfully',
            'data'    => new ProductResource($product),
        ], 200);
    }

    public function softDelete(string $id)
    {
        $deleted = $this->productService->softDeleteProduct($id);

        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Product not found'], 404);
        }

        return response()->json(['status' => true, 'message' => 'Product soft deleted successfully']);
    }

    public function trashed()
    {
        $products = $this->productService->getTrashedProducts();

        return response()->json([
            'status'  => true,
            'message' => 'Trashed products retrieved successfully',
            'data'    => ProductResource::collection($products),
        ], 200);
    }

    public function restore(string $id)
    {
        $restored = $this->productService->restoreProduct($id);

        if (!$restored) {
            return response()->json(['status' => false, 'message' => 'Product not found or not deleted'], 404);
        }

        return response()->json(['status' => true, 'message' => 'Product restored successfully']);
    }

    public function forceDelete(string $id)
    {
        $deleted = $this->productService->forceDeleteProduct($id);

        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Product not found'], 404);
        }

        return response()->json(['status' => true, 'message' => 'Product permanently deleted']);
    }
}
