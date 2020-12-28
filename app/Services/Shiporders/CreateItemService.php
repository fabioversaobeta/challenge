<?php

namespace App\Services\ShipOrders;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Models\Item;

class CreateItemService
{
    public function create($idOrder, $title, $note)
    {
        $found = Item::where('title', $title)->where('note', $note)->first();

        if ($found) {
            return $found;
        }

        $item = new Item();

        $item->title = $title;
        $item->note = $note;

        $item->save();

        return $item;
    }
}
