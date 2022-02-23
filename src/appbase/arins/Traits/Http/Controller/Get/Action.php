<?php

namespace Arins\Traits\Http\Controller\Get;

trait Action
{
    use Init, Response;

    /** get */
    public function index()
    {
        $this->initIndex();
        
        return $this->runResponseMethod('index');
    }

    /** get */
    public function show($id)
    {
        $this->initShow($id);

        return $this->runResponseMethod('show');
    }

    /** get */
    public function create()
    {
        $this->initCreate();

        return $this->runResponseMethod('create');
    }

    /** get */
    public function edit($id)
    {
        $this->initEdit($id);

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

