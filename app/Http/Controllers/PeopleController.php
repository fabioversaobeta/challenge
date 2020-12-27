<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PeopleController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $req)
    {
        $people = Person::with('phones')->get();

        return $this->responseJson($people, 200);
    }
}
