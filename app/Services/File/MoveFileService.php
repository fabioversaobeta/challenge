<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class MoveFileService
{
    /**
     * Move file to identify folder
     */
    public function moveFile($fileName, $folderName)
    {
        $destiny = $folderName."/".$fileName;

        Storage::move($fileName, $destiny);
    }
}
