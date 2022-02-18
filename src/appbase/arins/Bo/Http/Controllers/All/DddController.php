<?php

namespace Arins\Bo\Http\Controllers\All;

use Arins\Http\Controllers\BoController;
use Arins\Traits\Http\Controller\View\Base;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

use Arins\Repositories\Activity\ActivityRepositoryInterface;
use Arins\Repositories\Activitystatus\ActivitystatusRepositoryInterface;
use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Arins\Repositories\Activitysubtype\ActivitysubtypeRepositoryInterface;

class DddController extends BoController
{
    use Base;

    public function __construct(ActivitytypeRepositoryInterface $parData)
    {

        // parent::__construct('activity');
        parent::__construct();

        $this->data = $parData;
    }

    public function index()
    {

        return $this->data->all()[0]->activities;
        return $this->data->getInputField();
        return $this->data->getValidateInput();
        return $this->data->getValidateField();
        return 'ddd';
    }

    protected function transformField($paDataField) {

        return $dataField;
    }

}
