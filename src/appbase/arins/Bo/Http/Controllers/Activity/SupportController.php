<?php

namespace Arins\Bo\Http\Controllers\Activity;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Arins\Http\Controllers\BoController;
use Arins\Traits\Http\Controller\Base;

use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Arins\Repositories\Activity\ActivityRepositoryInterface;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

class SupportController extends BoController
{

    use Base;

    // protected $sViewRoot;
    // protected $data, $dataActivitytype;
    protected $dataActivitytype;


    public function __construct(ActivityRepositoryInterface $parData,
                                ActivitytypeRepositoryInterface $parActivitytype)
    {
        parent::__construct('support');

        $this->data = $parData;
        $this->dataActivitytype = $parActivitytype;

        $this->dataModel['activitytype'] = $this->dataActivitytype->all();
        $this->dataModel = json_decode(json_encode($this->dataModel), FALSE);
    }

    protected function transformField($paDataField) {
        $dataField = $paDataField;
        $dataField['activitytype_id'] = 1; //Support
        $dataField['startdt'] = now();

        return $dataField;
    }

}
