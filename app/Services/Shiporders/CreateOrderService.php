<?php

namespace App\Services\ShipOrders;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Models\Order;

class CreateOrderService
{
    public function create($id, $idPerson, $idAddress)
    {
        $found = Order::find($id);

        if ($found) {
            return $found;
        }

        $order = new Order();

        $order->id = $id;
        $order->person_id = $idPerson;
        $order->address_id = $idAddress;

        $order->save();

        return $order;
    }
}
