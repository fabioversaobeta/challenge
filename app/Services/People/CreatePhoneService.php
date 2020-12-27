<?php

namespace App\Services\People;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Models\Phone;

class CreatePhoneService
{
    public function create($idPerson, $phoneNumber)
    {
        $found = Phone::where('person_id', $idPerson)
                ->where('phone', $phoneNumber)->get();

        if ($found) {
            return false;
        }

        $phone = new Phone();

        $phone->person_id = $idPerson;
        $phone->phone = $phoneNumber;

        $phone->save();

        return $phone;
    }
}
