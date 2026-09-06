<?php

namespace App\Http\Controllers\Website\Api\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Models\Dashboard\Review\Review;
use Illuminate\Http\Request;

class PublicReviewController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $reviews = Review::where('product_id', $request->product_id)
            ->where('status', 'approved')
            ->latest()
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Reviews retrieved successfully',
            'data'    => $reviews,
        ], 200);
    }


    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();

        $data['comment'] = [
            'ar' => $data['comment'],
            'en' => null
        ];

        $data['status'] = 'pending';

        $review = Review::create($data);

        return response()->json([
            'status'  => true,
            'message' => 'Review submitted successfully and is pending approval',
            'data'    => $review,
        ], 201);
    }
}
