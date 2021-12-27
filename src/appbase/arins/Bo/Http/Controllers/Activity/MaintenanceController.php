<?php

namespace Arins\Bo\Http\Controllers\Activity;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Arins\Http\Controllers\BoController;
use Arins\Traits\Http\Controller\View\Base;

use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Arins\Repositories\Activity\ActivityRepositoryInterface;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

class MaintenanceController extends BoController
{

    use Base;

    // protected $sViewRoot;
    // protected $data, $dataActivitytype;
    protected $dataActivitytype;


    public function __construct(ActivityRepositoryInterface $parData,
                                ActivitytypeRepositoryInterface $parActivitytype)
    {

        parent::__construct('maintenance');

        $this->data = $parData;
        $this->dataActivitytype = $parActivitytype;

        $this->dataModel['activitytype'] = $this->dataActivitytype->all();
        $this->dataModel = json_decode(json_encode($this->dataModel), FALSE);
    }

    protected function transformField($paDataField) {
        $dataField = $paDataField;
        $dataField['activitytype_id'] = 2; //Maintenance
        $dataField['startdt'] = now();

        return $dataField;
    }

    /** get */
    public function reportDetail()
    {
        return dd('reportDetail');
        $data = $this->data->allOrderByIdDesc();

        $viewModel = Response::viewModel();
        $viewModel->data = $data;

        return view($this->sViewRoot.'.report-detail',
        ['viewModel' => $viewModel]);
    }

    /** get */
    public function reportRecap()
    {
        return dd('reportRecap');
        $data = $this->data->allOrderByIdDesc();

        $viewModel = Response::viewModel();
        $viewModel->data = $data;

        return view($this->sViewRoot.'.report-recap',
        ['viewModel' => $viewModel]);
    }

}
