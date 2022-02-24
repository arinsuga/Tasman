<?php

namespace Arins\Traits\Http\Controller\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

trait Action
{
    use Actionprocess, Actionresponse;

    /** post */
    public function store(Request $request)
    {
        $processResult = $this->processStore($request);
        if ($processResult == 1) {
            //step 2: Kembali ke halaman input
            return redirect()->route($this->sViewName . '.create')
            ->withErrors($this->validator)
            ->withInput();
        } //end if validator

        //save data success
        if ($processResult == 0) {
            return redirect()->route($this->sViewName . '.index');
        }

        //step 2: Kembali ke halaman input
        if ($processResult == 2)
        {
            return redirect()->route($this->sViewName . '.create')
            ->withInput();
        }
    }

    /** post */
    public function update(Request $request, $id)
    {
        $processResult = $this->processUpdate($request, $id);

        //validate input value fail
        if ($processResult == 1)
        {
            return redirect()->route($this->sViewName . '.edit', $id)
            ->withErrors($this->validator)
            ->withInput();
        } //end if

        //Save data success
        if ($processResult == 0) {
            return redirect()->route($this->sViewName . '.index');
        }

        //step 2: Kembali ke halaman input (Error exception)
        if ($processResult == 2)
        {
            return redirect()->route($this->sViewName . '.edit', $id)
            ->withInput();
        }
    }

    /** post */
    public function destroy($id)
    {
        //
        $record = $this->data->find($id);
        $fileName = $record->image;
        
        //$model->delete();
        $this->data->delete($record);
        Filex::delete($fileName); 

        return redirect()->route($this->sViewName . '.index');
   }


}

