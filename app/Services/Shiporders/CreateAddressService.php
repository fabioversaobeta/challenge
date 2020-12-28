<?php

namespace App\Services\ShipOrders;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Models\Address;

class CreateAddressService
{
    public function create($idPerson, $name, $streetAddress, $city, $country)
    {
        $found = Address::where('person_id', $idPerson)
                ->where('name', $name)
                ->first();

        if ($found) {
            return $found;
        }

        $address = new Address();

        $address->person_id = $idPerson;
        $address->name = $name;
        $address->address = $streetAddress;
        $address->city = $city;
        $address->country = $country;

        $address->save();

        return $address;
    }
}
