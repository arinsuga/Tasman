<?php

namespace Arins\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

// use Arins\Facades\Response;
// use Arins\Facades\Filex;
// use Arins\Facades\Formater;
// use Arins\Facades\ConvertDate;

class BoController extends Controller
{

    protected $appConfig, $appMode;
    protected $viewModel, $dataModel, $dataField;
    protected $sViewRoot, $sViewName;
    protected $aResponseData, $aResponseAdditionalData;
    protected $data, $validator;


    public function __construct($psViewName=null)
    {
        $this->middleware('auth.admin');
        $this->middleware('is.admin');
        $this->sViewName = $psViewName;
        $this->sViewRoot = 'bo.' . $this->sViewName;
        $this->appConfig = 'a1.app';
        $this->appMode = config($this->appConfig . '.mode');
        $this->aResponseData = [];
        $this->aResponseAdditionalData = [];
    }

    protected function runResponseMethod($methodName)
    {
        $runMethod = config($this->appConfig . '.' . $this->appMode . '.response.' . $methodName);

        return $this->$runMethod();
    }


}
