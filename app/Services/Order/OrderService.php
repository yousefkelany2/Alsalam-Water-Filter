<?php

namespace App\Services\Order;

use App\Models\Dashboard\Governorate\Governorate;
use App\Models\Dashboard\Order\Order;
use App\Models\Dashboard\Product\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    public function getAllOrders()
    {
        return Order::with(['items.product', 'governorate'])->latest()->get();
    }

    public function createOrder(array $data)
    {
        try {
            DB::beginTransaction();

            $subtotal = 0;
            $orderItems = [];

            foreach ($data['items'] as $item) {
                $product = Product::find($item['id']);

                if (!$product) continue;

                $lineTotal = $product->price * $item['qty'];
                $subtotal += $lineTotal;

                $orderItems[] = [
                    'product_id' => $product->id,
                    'price'      => $product->price,
                    'quantity'   => $item['qty'],
                    'line_total' => $lineTotal,
                ];
            }

            $governorate = Governorate::find($data['governorate_id']);
            $shipping = $governorate ? $governorate->shipping_price : 0;

            $discount = $data['discount'] ?? 0;
            $total = ($subtotal + $shipping) - $discount;

            $order = Order::create([
                'order_number'   => 'ALS-' . strtoupper(Str::random(6)),
                'customer_name'  => $data['customer_name'],
                'customer_phone' => $data['customer_phone'],
                'customer_email' => $data['customer_email'] ?? null,
                'governorate_id' => $data['governorate_id'],
                'city'           => $data['city'],
                'address'        => $data['address'],
                'notes'          => $data['notes'] ?? null,
                'subtotal'       => $subtotal,
                'shipping'       => $shipping,
                'discount'       => $discount,
                'total'          => $total,
            ]);

            $order->items()->createMany($orderItems);

            DB::commit();

            return $order->load(['items.product', 'governorate']);

        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }

    public function getOrderById(string $id)
    {
        return Order::with(['items.product', 'governorate'])->find($id);
    }

    public function updateOrderStatus(string $id, array $data)
    {
        $order = Order::find($id);

        if (!$order) {
            return null;
        }

        $order->update($data);
        return $order->load(['items.product', 'governorate']);
    }

    public function softDeleteOrder(string $id): bool
    {
        $order = Order::find($id);

        if (!$order) {
            return false;
        }

        return $order->delete();
    }

    public function getTrashedOrders()
    {
        return Order::onlyTrashed()->with(['items.product', 'governorate'])->latest()->get();
    }

    public function restoreOrder(string $id): bool
    {
        $order = Order::withTrashed()->find($id);

        if (!$order || !$order->trashed()) {
            return false;
        }

        return $order->restore();
    }

    public function forceDeleteOrder(string $id): bool
    {
        $order = Order::withTrashed()->find($id);

        if (!$order) {
            return false;
        }

        return $order->forceDelete();
    }
}
