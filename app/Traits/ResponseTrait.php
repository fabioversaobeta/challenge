<?php

namespace App\Traits;

trait ResponseTrait
{
    public function responseJson($arDados, $intCodigo)
    {
        $blStatus = true;
        if ($intCodigo != 200 && $intCodigo != 201) {
            $blStatus = false;
        }

        $arResponse = [
            'status'   => $blStatus,
            'response' => $arDados
        ];

        return response()->json($arResponse, $intCodigo);
    }
}
