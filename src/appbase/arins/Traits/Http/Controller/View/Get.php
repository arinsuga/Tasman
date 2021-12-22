<?php

namespace Arins\Traits\Http\Controller\View;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

trait Get
{

    /** get */
    public function index()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->allOrderByIdDesc();

        return view($this->sViewRoot.'.index', ['viewModel' => $this->viewModel]);
    }

    /** get */
    public function show($id)
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->find($id);

        return view($this->sViewRoot.'.show', [
            'viewModel' => $this->viewModel,
            'new' => false,
            'fieldEnabled' => false
        ]);
    }

    /** get */
    public function create()
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = json_decode(json_encode($this->data->getInputField()));
        $this->viewModel->data->date = now();

        return view($this->sViewRoot.'.create', [
            'viewModel' => $this->viewModel,
            'new' => true,
            'fieldEnabled' => true,
            'dataModel' => $this->dataModel
        ]);
    }

    /** get */
    public function edit($id)
    {
        $this->viewModel = Response::viewModel();
        $this->viewModel->data = $this->data->find($id);

        return view($this->sViewRoot.'.edit', [
            'viewModel' => $this->viewModel,
            'new' => false,
            'fieldEnabled' => true,
            'dataModel' => $this->dataModel
        ]);
    }

    /** get */
    public function delete($id)
    {
        return view($this->sViewRoot.'.delete');
    }

}

