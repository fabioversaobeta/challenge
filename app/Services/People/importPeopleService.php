<?php

namespace App\Services\People;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Services\People\CreatePersonService;
use App\Services\People\CreatePhoneService;
use App\Models\Person;
use App\Models\Phone;

class ImportPeopleService
{
    private $createPersonService;
    private $createPhoneService;

    public function __construct(
        CreatePersonService $createPersonService,
        CreatePhoneService $createPhoneService
    )
    {
        $this->createPersonService = $createPersonService;
        $this->createPhoneService = $createPhoneService;
    }
    /**
     * Identify if file is of PEOPLE or SHIPORDERS
     *
     * $xmlArray (array)
     */
    public function importPeople($xmlArray)
    {
        $people = [];
        $collection = collect($xmlArray['person']);

        foreach ($collection as $key => $value) {
            $person = $this->createPersonService->create(
                $value->personid,
                $value->personname
            );

            if (!$person) {
                continue;
            }

            $phones = (array) $value->phones->phone;

            foreach ($phones as $keyPhone => $valuePhone) {
                $phoneCreated = $this->createPhoneService->create(
                    $person->id,
                    $valuePhone
                );

                if ($phoneCreated) {
                    $person->phones[] = $phoneCreated;
                }
            }

            $people[] = $person;
        }

        return [
            $people
        ];
    }
}
