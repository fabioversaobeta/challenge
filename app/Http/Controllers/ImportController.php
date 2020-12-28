<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\File\DataFileService;
use App\Services\File\IdentifyFileService;
use App\Services\People\ImportPeopleService;
use App\Services\ShipOrders\ImportShipOrderService;

class ImportController extends Controller
{
    public function __construct(
        DataFileService $dataFileService,
        IdentifyFileService $identifyFileService,
        ImportPeopleService $importPeopleService,
        ImportShipOrderService $importShipOrderService
    )
    {
        $this->dataFileService = $dataFileService;
        $this->identifyFileService = $identifyFileService;
        $this->importPeopleService = $importPeopleService;
        $this->importShipOrderService = $importShipOrderService;
    }

    public function index(Request $req)
    {
        $dados = [];
        $identify = 'unknow';

        /**
         * transform xml in array
         */
        $data = $this->dataFileService->dataFile($req->file('file'));

        if (!$data) {
            return $this->responseJson(['error' => 'invalid xml'], 400);
        }

        /**
         * indentify if is people of shiporders file
         */
        $identify = $this->identifyFileService->identifyFile($data);

        // import data
        switch ($identify) {
            case 'people':
                /**
                 * validate data
                 */

                /**
                 * import data
                 */
                $dados = $this->importPeopleService->importPeople($data);

                break;
            case 'shiporders':
                /**
                 * validate data
                 */

                /**
                 * import data
                 */
                $dados = $this->importShipOrderService->importShipOrder($data);
                break;
            default:
                # code...
                break;
        }

        return $this->responseJson($dados, 200);
    }
}
