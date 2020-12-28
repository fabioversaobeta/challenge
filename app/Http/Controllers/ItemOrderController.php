<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemOrder;

class ItemOrderController extends Controller
{
    public function index(Request $req)
    {
        $itemOrders = ItemOrder::all();

        return $this->responseJson($itemOrders, 200);
    }
}
