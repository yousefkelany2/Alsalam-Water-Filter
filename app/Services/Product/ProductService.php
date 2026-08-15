<?php

namespace App\Services\Product;

use App\Models\Dashboard\Product\Product;
use App\Services\Image\ImageService;


class ProductService
{
    public function getAllProducts()
    {
        return Product::with(['category', 'reviews'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->latest()
            ->get();
    }

    public function createProduct(array $data, $mainImage = null, $galleryImages = null)
    {
        $data['in_stock'] = (isset($data['stock_qty']) && $data['stock_qty'] > 0);

        if ($mainImage) {
            $data['image'] = ImageService::saveImage($mainImage, 'products/main');
        }

        if ($galleryImages) {
            $data['gallery'] = ImageService::saveImages($galleryImages, 'products/gallery');
        }

        return Product::create($data);
    }

    public function getProductById(string $id)
    {
        return Product::with(['category', 'reviews'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->find($id);
    }

    public function updateProduct(string $id, array $data, $mainImage = null, $galleryImages = null)
    {
        $product = Product::find($id);

        if (!$product) {
            return null;
        }

        if (isset($data['stock_qty'])) {
            $data['in_stock'] = ($data['stock_qty'] > 0);
        }

        if ($mainImage) {
            if ($product->image) {
                ImageService::deleteImage($product->image);
            }
            $data['image'] = ImageService::saveImage($mainImage, 'products/main');
        }

        if ($galleryImages) {
            if ($product->gallery) {
                foreach ($product->gallery as $oldImage) {
                    ImageService::deleteImage($oldImage);
                }
            }
            $data['gallery'] = ImageService::saveImages($galleryImages, 'products/gallery');
        }

        $product->update($data);

        return $product;
    }

    public function softDeleteProduct(string $id): bool
    {
        $product = Product::find($id);

        if (!$product) {
            return false;
        }

        return $product->delete();
    }

    public function getTrashedProducts()
    {
        return Product::onlyTrashed()->latest()->get();
    }

    public function restoreProduct(string $id): bool
    {
        $product = Product::withTrashed()->find($id);

        if (!$product || !$product->trashed()) {
            return false;
        }

        return $product->restore();
    }

    public function forceDeleteProduct(string $id): bool
    {
        $product = Product::withTrashed()->find($id);

        if (!$product) {
            return false;
        }

        if ($product->image) {
            ImageService::deleteImage($product->image);
        }

        if ($product->gallery) {
            foreach ($product->gallery as $img) {
                ImageService::deleteImage($img);
            }
        }

        return $product->forceDelete();
    }
}
