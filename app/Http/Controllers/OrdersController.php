<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index(Request $req)
    {
        $orders = Order::all();

        return $this->responseJson($orders, 200);
    }
}
