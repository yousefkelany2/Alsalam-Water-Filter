<?php

namespace App\Http\Controllers\Dashboard\Api\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Dashboard\Review\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product')->latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Reviews retrieved successfully',
            'data'    => ReviewResource::collection($reviews),
        ], 200);
    }

    public function store(ReviewRequest $request)
    {
        $review = Review::create($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Review created successfully',
            'data'    => new ReviewResource($review),
        ], 201);
    }

    public function show(string $id)
    {
        $review = Review::with('product')->find($id);

        if (!$review) {
            return response()->json(['status' => false, 'message' => 'Review not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Review retrieved successfully',
            'data'    => new ReviewResource($review),
        ], 200);
    }

    public function update(UpdateReviewRequest $request, string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['status' => false, 'message' => 'Review not found'], 404);
        }

        $review->update($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Review updated successfully',
            'data'    => new ReviewResource($review),
        ], 200);
    }

    public function softDelete(string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['status' => false, 'message' => 'Review not found'], 404);
        }

        $review->delete();

        return response()->json(['status' => true, 'message' => 'Review soft deleted successfully']);
    }

    public function trashed()
    {
        $reviews = Review::onlyTrashed()->with('product')->latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Trashed reviews retrieved successfully',
            'data'    => ReviewResource::collection($reviews),
        ], 200);
    }

    public function restore(string $id)
    {
        $review = Review::withTrashed()->find($id);

        if (!$review || !$review->trashed()) {
            return response()->json(['status' => false, 'message' => 'Review not found or not deleted'], 404);
        }

        $review->restore();

        return response()->json(['status' => true, 'message' => 'Review restored successfully']);
    }

    public function forceDelete(string $id)
    {
        $review = Review::withTrashed()->find($id);

        if (!$review) {
            return response()->json(['status' => false, 'message' => 'Review not found'], 404);
        }

        $review->forceDelete();

        return response()->json(['status' => true, 'message' => 'Review permanently deleted']);
    }
}
