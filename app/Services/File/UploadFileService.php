<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class UploadFileService
{
    /**
     * Store upload file in local store
     */
    public function uploadFile($fileName, $fileContent)
    {
        Storage::disk('local')->put($fileName, $fileContent);
    }
}
