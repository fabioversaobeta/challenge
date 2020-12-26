<?php

namespace App\Services\File;

use Exception;
use Illuminate\Support\Facades\Config;

class DataFileService
{
    /**
     * Identify if file is of PEOPLE or SHIPORDERS
     */
    public function dataFile($xmlName)
    {
        $array = \XML::import($xmlName)->toArray();

        $index = array_key_first($array);

        $data = $array[$index];

        return $data;
    }
}
