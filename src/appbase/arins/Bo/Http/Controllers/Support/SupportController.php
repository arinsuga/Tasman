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
use Arins\Repositories\Technician\TechnicianRepositoryInterface;

use Arins\Facades\Response;

class SupportController extends ActivityController
{

    public function __construct(ActivityRepositoryInterface $parData,
                                ActivitytypeRepositoryInterface $parActivitytype,
                                ActivitysubtypeRepositoryInterface $parActivitysubtype,
                                TasktypeRepositoryInterface $parTasktype,
                                Tasksubtype1RepositoryInterface $parTasksubtype1,
                                Tasksubtype2RepositoryInterface $parTasksubtype2,
                                EmployeeRepositoryInterface $parEmployee,
                                TechnicianRepositoryInterface $parTechnician)
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
            $parEmployee,
            $parTechnician
        );

    } //end construct

    /** get */
    public function indexToday()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->byActivitytypeTodayOrderByIdAndStartdtDesc($this->activitytype_id);

        $this->aResponseData = ['viewModel' => $this->viewModel];

        foreach ($this->dataModel as $key => $value) {

            $this->aResponseData[$key] = $value;

        } //end loop

        return view($this->sViewRoot.'.index-today', $this->aResponseData);
    }

    /** get */
    public function indexOpen()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->byActivitytypeStatusOpenOrderByIdAndStartdtDesc($this->activitytype_id);

        $this->aResponseData = ['viewModel' => $this->viewModel];

        foreach ($this->dataModel as $key => $value) {

            $this->aResponseData[$key] = $value;

        } //end loop

        return view($this->sViewRoot.'.index-open', $this->aResponseData);
    }

    /** get */
    public function indexCustom()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->allOrderByIdDesc();

        $this->aResponseData = ['viewModel' => $this->viewModel];

        foreach ($this->dataModel as $key => $value) {

            $this->aResponseData[$key] = $value;

        } //end loop

        return view($this->sViewRoot.'.index-custom', $this->aResponseData);
    }

} //end class
