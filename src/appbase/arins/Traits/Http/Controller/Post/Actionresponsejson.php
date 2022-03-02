<?php

namespace Arins\Traits\Http\Controller\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait Actionresponsejson
{

    public function responseJsonStore0()
    {
        return redirect()->route($this->sViewName . '.index');
    }

    public function responseJsonStore1()
    {
        // return dd('berhasil response view store 1');
        return redirect()->route($this->sViewName . '.create')
        ->withErrors($this->validator)
        ->withInput();
    }

    public function responseJsonStore2()
    {
        // return dd('berhasil response view store 2');
        return redirect()->route($this->sViewName . '.create')
        ->withInput();
    }

    public function responseJsonUpdate0($id)
    {
        return redirect()->route($this->sViewName . '.index');
    }

    public function responseJsonUpdate1($id)
    {
        return redirect()->route($this->sViewName . '.edit', $id)
        ->withErrors($this->validator)
        ->withInput();
    }

    public function responseJsonUpdate2($id)
    {
        return redirect()->route($this->sViewName . '.edit', $id)
        ->withInput();
    }

    public function responseJsonDestroy0($id)
    {
        return redirect()->route($this->sViewName . '.index');
    }

    public function responseJsonDestroy1($id)
    {
        //code here...
    }

    public function responseJsonDestroy2($id)
    {
        //code here...
    }


}

