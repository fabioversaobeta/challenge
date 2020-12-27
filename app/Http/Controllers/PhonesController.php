<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class PhonesController extends Controller
{
    public function index(Request $req)
    {
        $phones = Phone::all();

        return $this->responseJson($phones, 200);
    }
}
