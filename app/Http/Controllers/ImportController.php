<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\File\DataFileService;
use App\Services\File\IdentifyFileService;
use App\Services\People\ImportPeopleService;

class ImportController extends Controller
{
    public function __construct(
        DataFileService $dataFileService,
        IdentifyFileService $identifyFileService,
        ImportPeopleService $importPeopleService
    )
    {
        $this->dataFileService = $dataFileService;
        $this->identifyFileService = $identifyFileService;
        $this->importPeopleService = $importPeopleService;
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
                 * validate rules
                 */
                // $validator = Validator::make($data, [
                //     'person.personid' => 'required|numeric',
                //     'person.personname' => 'required|string',
                // ], $messages = [
                //     'required' => 'The :attribute field is required.',
                //     'numeric' => 'The :attribute field has be numeric.',
                //     'string' => 'The :attribute field has be string.'
                // ]);

                // if ($validator->fails()) {
                //     return  $this->responseJson(
                //         [
                //             'error' => 'not is valid',
                //             'errors' => $validator->errors(),
                //             'validator' => $validator,
                //             'data' => $data
                //         ],
                //         400
                //     );
                // }

                /**
                 * import data
                 */
                $dados = $this->importPeopleService->importPeople($data);

                break;
            case 'shiporders':
                $dados = 'shiporders';
                break;
            default:
                # code...
                break;
        }

        return $this->responseJson($dados, 200);
    }
}
