<?php

namespace App\Services\People;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Models\Person;

class CreatePersonService
{
    public function create($id, $name)
    {
        $found = Person::find($id);

        if ($found) {
            return false;
        }

        $person = new Person();

        $person->id = $id;

        // fix object type to array
        $name = (array) $name;
        $person->name = $name[0];

        $person->save();

        return $person;
    }
}
