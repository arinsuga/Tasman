<?php

namespace Arins\Bo\Http\Controllers\Mastercategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arins\Http\Controllers\BoController;
use Arins\Traits\Http\Controller\Base;


use Arins\Repositories\Tasktype\TasktypeRepositoryInterface;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

class MastercategoryController extends BoController
{
    use Base;

    public function __construct(TasktypeRepositoryInterface $parData)
    {
        $this->sViewName = 'mastercategory';
        parent::__construct();
        $this->data = $parData;
    }
}
