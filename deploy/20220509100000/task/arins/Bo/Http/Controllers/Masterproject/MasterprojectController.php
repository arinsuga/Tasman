<?php

namespace Arins\Bo\Http\Controllers\Masterproject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arins\Bo\Http\Controllers\Master\MasterController;

use Arins\Repositories\Tasktype\TasktypeRepositoryInterface;
use Arins\Repositories\Tasksubtype1\Tasksubtype1RepositoryInterface;

use Arins\Facades\Response;
// use Arins\Facades\Filex;
// use Arins\Facades\Formater;
// use Arins\Facades\ConvertDate;

class MasterprojectController extends MasterController
{
    protected $dataActivitytype, $dataTasktype;

    public function __construct(Tasksubtype1RepositoryInterface $parData,
                                TasktypeRepositoryInterface $parDataTasktype)
    {
        $this->sViewName = 'masterproject';
        $this->activitytype_id = 3; //Project
        $this->tasktype_id = null; //di null kan krn ambil dari user input

        parent::__construct();

        $this->data = $parData;
        $this->dataTasktype = $parDataTasktype;

        $this->dataModel = [
            'tasktype' => $this->dataTasktype->byActivitytype($this->activitytype_id),
        ];        

    }

    //override method
    protected function processIndex()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->byActivitytype($this->activitytype_id);
    }

}
