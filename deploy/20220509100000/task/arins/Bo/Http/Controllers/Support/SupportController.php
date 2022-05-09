<?php

namespace Arins\Bo\Http\Controllers\Support;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

use Arins\Bo\Http\Controllers\Activity\ActivityController;

use Arins\Repositories\Activity\ActivityRepositoryInterface;
    
use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Arins\Repositories\Activitysubtype\ActivitysubtypeRepositoryInterface;
use Arins\Repositories\Tasktype\TasktypeRepositoryInterface;
use Arins\Repositories\Tasksubtype1\Tasksubtype1RepositoryInterface;
use Arins\Repositories\Tasksubtype2\Tasksubtype2RepositoryInterface;
use Arins\Repositories\Employee\EmployeeRepositoryInterface;

use Arins\Facades\Response;

class SupportController extends ActivityController
{

    public function __construct(ActivityRepositoryInterface $parData,
                                ActivitytypeRepositoryInterface $parActivitytype,
                                ActivitysubtypeRepositoryInterface $parActivitysubtype,
                                TasktypeRepositoryInterface $parTasktype,
                                Tasksubtype1RepositoryInterface $parTasksubtype1,
                                Tasksubtype2RepositoryInterface $parTasksubtype2,
                                EmployeeRepositoryInterface $parEmployee)
    {
        $this->uploadDirectory = 'support';
        $this->sViewName = 'support';
        $this->activitytype_id = 1; //support

        parent::__construct(
            $parData,
            $parActivitytype,
            $parActivitysubtype,
            $parTasktype,
            $parTasksubtype1,
            $parTasksubtype2,
            $parEmployee
        );

    } //end construct


    protected function processReport()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->allOrderByIdDesc();
    }

    public function reportDetail()
    {
        //Check if additional data exist
        if (method_exists($this, 'indexAdditionalData')) {
            $additionalData = $this->indexAdditionalData();
        } //end if

        $this->processReport();
        
        //return dd($this->viewModel->data[0]->enduser->name);

        return $this->responseView('report-detail', false, false, false);
    }


} //end class
