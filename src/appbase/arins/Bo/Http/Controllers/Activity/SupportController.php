<?php

namespace Arins\Bo\Http\Controllers\Activity;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Arins\Http\Controllers\BoController;
use Arins\Traits\Http\Controller\Base;

use Arins\Repositories\Activity\ActivityRepositoryInterface;

use Arins\Repositories\Activitysubtype\ActivitysubtypeRepositoryInterface;
use Arins\Repositories\Tasktype\TasktypeRepositoryInterface;
use Arins\Repositories\Tasksubtype1\Tasksubtype1RepositoryInterface;
use Arins\Repositories\Tasksubtype2\Tasksubtype2RepositoryInterface;

class SupportController extends BoController
{

    use Base;

    // protected $sViewRoot;
    // protected $data, $dataActivitytype;
    protected $activitytype_id;
    protected $dataActivitysubtype;
    protected $dataTasktype;
    protected $dataTasksubtype1;
    protected $dataTasksubtype2;


    public function __construct(ActivityRepositoryInterface $parData,
                                ActivitysubtypeRepositoryInterface $parActivitysubtype,
                                TasktypeRepositoryInterface $parTasktype,
                                Tasksubtype1RepositoryInterface $parTasksubtype1,
                                Tasksubtype2RepositoryInterface $parTasksubtype2)
    {
        parent::__construct('support');

        $this->activitytype_id = 1; //support
        $this->data = $parData;
        $this->dataActivitysubtype = $parActivitysubtype;
        $this->dataTasktype = $parTasktype;
        $this->dataTasksubtype1 = $parTasksubtype1;
        $this->dataTasksubtype2 = $parTasksubtype2;

        $this->dataModel = [
            'activitysubtype' => $this->dataActivitysubtype->byActivitytype($this->activitytype_id),
            'tasktype' => $this->dataTasktype->all(),
            'tasksubtype1' => $this->dataTasksubtype1->all(),
            'tasksubtype2' => $this->dataTasksubtype2->all(),
        ];        
    }

    protected function transformField($paDataField) {
        $dataField = $paDataField;
        $dataField['activitytype_id'] = 1; //Support
        $dataField['activitystatus_id'] = 1; //open
        $dataField['startdt'] = now();

        return $dataField;
    }

}
