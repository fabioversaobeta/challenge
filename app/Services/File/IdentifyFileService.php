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
        if ($xmlArray['person']) {
            return "people";
        }

        if ($xmlArray['shiporder']) {
            return "shiporders";
        }

        return 'unknow';
    }
}
