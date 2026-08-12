<?php

namespace App\Http\Controllers\Dashboard\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Services\Order\OrderService;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();

        return response()->json([
            'status'  => true,
            'message' => 'Orders retrieved successfully',
            'data'    => OrderResource::collection($orders),
        ], 200);
    }

    public function store(OrderRequest $request)
    {
        $order = $this->orderService->createOrder($request->validated());

        if (!$order) {
            return response()->json([
                'status'  => false,
                'message' => 'Failed to create order due to a server error.'
            ], 500);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Order created successfully',
            'data'    => new OrderResource($order),
        ], 201);
    }

    public function show(string $id)
    {
        $order = $this->orderService->getOrderById($id);

        if (!$order) {
            return response()->json(['status' => false, 'message' => 'Order not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Order retrieved successfully',
            'data'    => new OrderResource($order),
        ], 200);
    }

    public function update(UpdateOrderRequest $request, string $id)
    {
        $order = $this->orderService->updateOrderStatus($id, $request->validated());

        if (!$order) {
            return response()->json(['status' => false, 'message' => 'Order not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Order status updated successfully',
            'data'    => new OrderResource($order),
        ], 200);
    }

    public function softDelete(string $id)
    {
        $deleted = $this->orderService->softDeleteOrder($id);

        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Order not found'], 404);
        }

        return response()->json(['status' => true, 'message' => 'Order soft deleted successfully']);
    }

    public function trashed()
    {
        $orders = $this->orderService->getTrashedOrders();

        return response()->json([
            'status'  => true,
            'message' => 'Trashed orders retrieved successfully',
            'data'    => OrderResource::collection($orders),
        ], 200);
    }

    public function restore(string $id)
    {
        $restored = $this->orderService->restoreOrder($id);

        if (!$restored) {
            return response()->json(['status' => false, 'message' => 'Order not found or not deleted'], 404);
        }

        return response()->json(['status' => true, 'message' => 'Order restored successfully']);
    }

    public function forceDelete(string $id)
    {
        $deleted = $this->orderService->forceDeleteOrder($id);

        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Order not found'], 404);
        }

        return response()->json(['status' => true, 'message' => 'Order permanently deleted']);
    }
}
