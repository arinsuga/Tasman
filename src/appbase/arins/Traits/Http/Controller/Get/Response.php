<?php

namespace Arins\Traits\Http\Controller\Get;

trait Response
{
    protected function responseViewIndex()
    {
        return view($this->sViewRoot.'.index', ['viewModel' => $this->viewModel]);
    }

    protected function responseJsonIndex()
    {
        return json_encode(['viewModel' => $this->viewModel]);
    }

    protected function responseViewShow()
    {
        return view($this->sViewRoot.'.show', [
            'viewModel' => $this->viewModel,
            'new' => false,
            'fieldEnabled' => false
        ]);
    }
    
    protected function responseJsonShow()
    {
        return json_encode([
            'viewModel' => $this->viewModel,
            'new' => false,
            'fieldEnabled' => false
        ]);
    }

    protected function responseViewCreate()
    {
        return view($this->sViewRoot.'.create', [
            'viewModel' => $this->viewModel,
            'new' => true,
            'fieldEnabled' => true,
            'dataModel' => $this->dataModel
        ]);
    }

    protected function responseJsonCreate()
    {
        return json_encode([
            'viewModel' => $this->viewModel,
            'new' => true,
            'fieldEnabled' => true,
            'dataModel' => $this->dataModel
        ]);
    }

}

