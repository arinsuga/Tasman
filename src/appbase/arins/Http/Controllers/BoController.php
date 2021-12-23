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

    protected $viewModel, $dataModel, $dataField;
    protected $sViewRoot, $sViewName;
    protected $data;


    public function __construct($psViewName)
    {
        $this->middleware('auth.admin');
        $this->middleware('is.admin');
        $this->sViewName = $psViewName;
        $this->sViewRoot = 'bo.' . $this->sViewName;
    }

}
