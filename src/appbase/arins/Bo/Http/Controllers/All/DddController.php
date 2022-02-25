<?php

namespace Arins\Bo\Http\Controllers\All;

use Arins\Http\Controllers\BoController;
use Arins\Traits\Http\Controller\Base;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

use Arins\Repositories\Activity\ActivityRepositoryInterface;
use Arins\Repositories\Activitystatus\ActivitystatusRepositoryInterface;
use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Arins\Repositories\Activitysubtype\ActivitysubtypeRepositoryInterface;
use Arins\Repositories\Tasktype\TasktypeRepositoryInterface;
use Arins\Repositories\Tasksubtype1\Tasksubtype1RepositoryInterface;
use Arins\Repositories\Tasksubtype2\Tasksubtype2RepositoryInterface;

use Arins\Repositories\Employee\EmployeeRepositoryInterface;
use Arins\Repositories\Subdept\SubdeptRepositoryInterface;

class DddController extends BoController
{
    use Base;

    public function __construct(EmployeeRepositoryInterface $parData)
    {

        parent::__construct();

        $this->data = $parData;
    }

    public function index()
    {


        $this->aResponseData = [
            'empat' => 4,
        ];
        $this->aResponseData['lima'] = 5;
        return $this->aResponseData;
        array_push($this->aResponseData, [
            'satu' => 1,
            'dua' => 2,
            'tiga' => 3,
        ]);
        
        $aHai = [
            'satu' => 1,
            'dua' => 2,
            'tiga' => 3,
        ];
        return $aHai;

        return $this->data->all();
        // return $this->data->all();
        // return $this->data->getInputField();
        // return $this->data->getValidateInput();
        // return $this->data->getValidateField();
        return 'ddd';
    }

    protected function transformField($paDataField) {

        return $dataField;
    }

}
