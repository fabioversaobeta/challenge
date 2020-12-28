<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index(Request $req)
    {
        $items = Item::all();

        return $this->responseJson($items, 200);
    }
}
