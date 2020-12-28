<?php

namespace App\Services\File;

use Exception;
use Illuminate\Support\Facades\Config;

class DataFileService
{
    /**
     * get file xml to convert in array
     */
    public function dataFile($xmlName)
    {
        try {
            $array = \XML::import($xmlName)->toArray();
        } catch (Exception $e) {
            return false;
        }

        $index = array_key_first($array);

        if (!isset($array[$index])) {
            return $array;
        }

        $data = (array) $array[$index];

        return $data;
    }
}
