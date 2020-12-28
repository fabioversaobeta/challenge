<?php

namespace App\Services\ShipOrders;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Services\ShipOrders\CreateOrderService;
use App\Services\ShipOrders\CreateAddressService;
use App\Services\ShipOrders\CreateItemService;
use App\Services\ShipOrders\CreateItemOrderService;
use App\Models\Person;
use App\Models\Phone;

class ImportShipOrderService
{
    private $createOrderService;
    private $createAddressService;
    private $createItemService;

    public function __construct(
        CreateOrderService $createOrderService,
        CreateAddressService $createAddressService,
        CreateItemService $createItemService,
        CreateItemOrderService $createItemOrderService
    )
    {
        $this->createOrderService = $createOrderService;
        $this->createAddressService = $createAddressService;
        $this->createItemService = $createItemService;
        $this->createItemOrderService = $createItemOrderService;
    }

    public function importShipOrder($xmlArray)
    {
        $shipOrders = [];
        $collection = $xmlArray['shiporder'];
        $data = [];

        foreach ($collection as $key => $value) {
            /**
             * Address
             */
            $address = $this->createAddressService->create(
                $value->orderperson,
                $this->normalize($value->shipto->name),
                $this->normalize($value->shipto->address),
                $this->normalize($value->shipto->city),
                $this->normalize($value->shipto->country)
            );

            if (!$address) {
                continue;
            }

            /**
             * Order
             */
            $order = $this->createOrderService->create(
                $value->orderid,
                $value->orderperson,
                $address->id
            );

            if (!$order) {
                continue;
            }

            $items = collect($value->items->item);

            /**
             * Items
             */
            foreach ($value->items->item as $keyItem => $valueItem) {
                $item = $valueItem;

                /**
                 * create items
                 */
                $itemCreated = $this->createItemService->create(
                    $order->id,
                    $this->normalize($item->title),
                    $this->normalize($item->note)
                );

                if ($itemCreated) {
                    $itemOrderCreated = $this->createItemOrderService->create(
                        $order, $itemCreated, $item,
                        $this->normalize($item->quantity),
                        $this->normalize($item->price)
                    );
                }
            }

            // $order->items = $order->items();

            // $shipOrders[] = $order;

            // $data = $shipOrders;
        }

        $data = \App\Models\Order::with('items')->get();

        return $data;
    }

    private function normalize($value)
    {
        $value = (array) $value;

        return isset($value[0]) ? $value[0] : $value;
    }
}
