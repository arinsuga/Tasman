<?php

namespace Arins\Traits\Http\Controller\Get;

trait Action
{
    use Actionprocess, Actionresponse;

    /** get */
    public function index()
    {
        $this->processIndex();
        
        return $this->runResponseMethod('index');
    }

    /** get */
    public function show($id)
    {
        $this->processShow($id);

        return $this->runResponseMethod('show');
    }

    /** get */
    public function create()
    {
        $this->processCreate();

        return $this->runResponseMethod('create');
    }

    /** get */
    public function edit($id)
    {
        $this->processEdit($id);

        return $this->runResponseMethod('edit');
    }

    /** get */
    public function delete($id)
    {
        return view($this->sViewRoot.'.delete');
    }

}

