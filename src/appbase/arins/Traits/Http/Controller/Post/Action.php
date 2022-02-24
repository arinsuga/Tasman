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

    /** post */
    public function store(Request $request)
    {
        //get input value by fillable fields
        $data = $request->only($this->data->getFillable()); //get field input
        $upload = $request->file('upload'); //upload file (image/document) ==> if included
        $imageTemp = $request->input('imageTemp'); //temporary file uploaded
        
        //Check if inputs need to be transformed by transformField method
        if (method_exists($this, 'transformField')) {
            $data = $this->transformField($data);
        } //end if


        //create temporary uploaded image
        $uploadTemp = Filex::uploadTemp($upload, $imageTemp);
        $request->session()->flash('imageTemp', $uploadTemp);

        //validate input value
        $validator = Validator::make($data, $this->data->getValidateInput());
        if ($validator->fails()) {
            //step 2: Kembali ke halaman input
            return redirect()->route($this->sViewName . '.create')
            ->withErrors($validator)
            ->withInput();
        } //end if validator

        //copy temporary uploaded image to real path
        $data['image'] = Filex::uploadOrCopyAndRemove('', $uploadTemp, 'activities', $upload, 'public', false);
        
        //save data
        if ($this->data->create($data)) {
            return redirect()->route($this->sViewName . '.index');
        }

        /** jika tetap terjadi kesalahan maka ada kesalahan pada system */
        //step 1: delete image if fail to save
        Filex::delete($data['image']);

        //step 2: Kembali ke halaman input
        return redirect()->route($this->sViewName . '.create')
        ->withInput();

    }

    /** post */
    public function update(Request $request, $id)
    {
        //get data from database
        $record = $this->data->find($id);
        $imageOld = $record->image;

        //get input value by fillable fields
        $data = $request->only($this->data->getFillable()); //get field input
        $upload = $request->file('upload'); //upload file (image/document) ==> if included
        $imageTemp = $request->input('imageTemp'); //temporary file uploaded
        $toggleRemoveImage = $request->input('toggleRemoveImage');
        //return dd($toggleRemoveImage);

        // return dd($data);
        // //convert input value (string/date/number/email/etc)
        // $data['startdt'] = ConvertDate::strDatetimeToDate($data['startdt']);
        // $data['enddt'] = ConvertDate::strDatetimeToDate($data['enddt']);

        //create temporary uploaded image
        $uploadTemp = Filex::uploadTemp($upload, $imageTemp);
        $request->session()->flash('imageTemp', $uploadTemp);

        //validate input value
        $request->validate($this->data->getValidateInput());

        $imageNew = Filex::uploadOrCopyAndRemove($imageOld, $uploadTemp, 'activities', $upload, 'public', false);
        $data['image'] = $imageNew;
        if (strtolower($toggleRemoveImage) ==  'true')
        {
            $data['image'] = null;
        }

        if ($this->data->update($record, $data)) {
            if ($uploadTemp != null)
            {
                Filex::delete($imageOld);
                Filex::delete($uploadTemp);
            } //end if

            if (strtolower($toggleRemoveImage) == 'true')
            {
                Filex::delete($imageOld);
                Filex::delete($imageNew);
                Filex::delete($uploadTemp);
            }
            return redirect()->route($this->sViewName . '.index');
        }

        /** jika tetap terjadi kesalahan maka ada kesalahan pada system */
        //step 1: delete image if fail to save
        if ($uploadTemp != null)
        {
            Filex::delete($data['image']);
        } //end if

        //step 2: Kembali ke halaman input
        return redirect()->route($this->sViewName . '.edit', $id)
        ->withInput();
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

