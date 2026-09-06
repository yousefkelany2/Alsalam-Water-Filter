<?php

namespace App\Http\Controllers\Website\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StorePublicOrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Dashboard\Order\Order;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class PublicOrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function store(StorePublicOrderRequest $request)
    {
        try {
            $orderData = $request->toServiceFormat();

            $order = $this->orderService->createOrder($orderData);

            return response()->json([
                'status'      => true,
                'message'     => 'Order created successfully',
                'orderNumber' => $order->order_number,
                'data'        => new OrderResource($order),
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function show(string $orderNumber)
    {
        $order = Order::with(['items.product', 'governorate'])
            ->where('order_number', $orderNumber)
            ->first();

        if (!$order) {
            return response()->json(['status' => false, 'message' => 'Order not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Order retrieved successfully',
            'data'    => new OrderResource($order),
        ], 200);
    }
}
