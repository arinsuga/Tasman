<?php

namespace Arins\Traits\Http\Controller\Get;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

trait Init
{
    protected function initIndex()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->allOrderByIdDesc();
    }

    protected function initShow($id)
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->find($id);

    }

    protected function initCreate()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = json_decode(json_encode($this->data->getInputField()));
        $this->viewModel->data->date = now();
    }

    protected function initEdit($id)
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->find($id);
    }

}

