<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index(Request $req)
    {
        $address = Address::all();

        return $this->responseJson($address, 200);
    }
}
