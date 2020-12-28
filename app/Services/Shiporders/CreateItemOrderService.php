<?php

namespace App\Services\ShipOrders;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Models\ItemOrder;

class CreateItemOrderService
{
    public function create($order, $itemCreated, $item, $quantity, $price)
    {
        $found = ItemOrder::where('order_id', $order->id)
            ->where('item_id', $itemCreated->id)
            ->first();

        if ($found) {
            return $found;
        }

        $order->items()->attach($itemCreated, [
            'quantity' => $quantity,
            'price' => $price,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $found = ItemOrder::where('order_id', $order->id)
            ->where('item_id', $itemCreated->id)
            ->first();

        if ($found) {
            return $found;
        }

        // $found = ItemOrder::where('order_id', $idOrder)
        //     ->where('item_id', $idItem)
        //     ->first();

        // $itemOrder = new ItemOrder();

        // $itemOrder->order_id = $idOrder;
        // $itemOrder->item_id = $idItem;
        // $itemOrder->quantity = $quantity;
        // $itemOrder->price = $price;

        // $itemOrder->save();

        // return $itemOrder;
        return false;
    }
}
