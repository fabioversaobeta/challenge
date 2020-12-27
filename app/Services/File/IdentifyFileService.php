<?php

namespace App\Services\File;

use Exception;
use Illuminate\Support\Facades\Config;

class IdentifyFileService
{
    /**
     * Identify if file is of PEOPLE or SHIPORDERS
     *
     * $xmlArray (array)
     */
    public function identifyFile($xmlArray)
    {
        if (isset($xmlArray['person'])) {
            return "people";
        }

        if (isset($xmlArray['shiporder'])) {
            return "shiporders";
        }

        return 'unknow';
    }
}
