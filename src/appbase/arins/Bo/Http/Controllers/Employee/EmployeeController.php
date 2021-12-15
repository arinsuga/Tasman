<?php

namespace Arins\Bo\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arins\Repositories\Employee\EmployeeRepositoryInterface;
use Arins\Repositories\Job\JobRepositoryInterface;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

class EmployeeController extends Controller
{

    protected $routeBase;
    protected $sViewRoot;
    protected $data, $dataJob;
    protected $uploadLoc;


    public function __construct(EmployeeRepositoryInterface $parData,
                                JobRepositoryInterface $parJob)
    {
        $this->middleware('auth.admin');
        $this->middleware('is.admin');

        $this->routeBase = 'employee';
        $psViewRoot = 'bo.employee';
        $this->sViewRoot = $psViewRoot;
        $this->data = $parData;
        $this->dataJob = $parJob;
        $this->uploadLoc = 'employee';
    }

    /** get */
    public function index()
    {
        $viewModel = Response::viewModel();
        $viewModel->data = $this->data->allOrderByIdDesc();

        return view($this->sViewRoot.'.index',
        ['viewModel' => $viewModel]);
    }

    /** get */
    public function show($id)
    {
        $viewModel = Response::viewModel();
        $viewModel->data = $this->data->find($id);
        
        return view($this->sViewRoot.'.show',
        ['viewModel' => $viewModel, 'new' => false, 'fieldEnabled' => false]);
    }

    /** get */
    public function create()
    {
        $viewModel = Response::viewModel();
        $viewModel->data = json_decode(json_encode($this->data->getInputField()));

        return view($this->sViewRoot.'.create',
        ['viewModel' => $viewModel, 'new' => true, 'fieldEnabled' => true,
        'job' => $this->dataJob->all()]);

    }

    /** get */
    public function edit($id)
    {
        $viewModel = Response::viewModel();
        $viewModel->data = $this->data->find($id);

        return view($this->sViewRoot.'.edit',
        ['viewModel' => $viewModel, 'new' => false, 'fieldEnabled' => true,
        'job' => $this->dataJob->all()]);
    }

    /** post */
    public function store(Request $request)
    {
        //get input value by fillable fields
        $data = $request->only($this->data->getFillable()); //get field input
        $upload = $request->file('upload'); //upload file (image/document) ==> if included
        $imageTemp = $request->input('imageTemp'); //temporary file uploaded
        
        //create temporary uploaded image
        $uploadTemp = Filex::uploadTemp($upload, $imageTemp);
        $request->session()->flash('imageTemp', $uploadTemp);

        //validate input value
        $request->validate($this->data->getValidateField());

        //copy temporary uploaded image to real path
        $data['image'] = Filex::uploadOrCopyAndRemove('', $uploadTemp, $this->uploadLoc, $upload, 'public', false);
        
        //save data
        if ($this->data->create($data)) {
            return redirect()->route($this->routeBase . '.index');
        }

        /** jika tetap terjadi kesalahan maka ada kesalahan pada system */
        //step 1: delete image if fail to save
        Filex::delete($data['image']);

        //step 2: Kembali ke halaman input
        return redirect()->route($this->routeBase . '.create')
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

        //convert input value (string/date/number/email/etc)
        $data['startdt'] = ConvertDate::strDatetimeToDate($data['startdt']);
        $data['enddt'] = ConvertDate::strDatetimeToDate($data['enddt']);

        //create temporary uploaded image
        $uploadTemp = Filex::uploadTemp($upload, $imageTemp);
        $request->session()->flash('imageTemp', $uploadTemp);

        //validate input value
        $request->validate($this->data->getValidateField());

        //copy temporary uploaded image to real path
        $data['image'] = Filex::uploadOrCopyAndRemove('', $uploadTemp, $this->uploadLoc, $upload, 'public', false);
        // Filex::delete($imageOld);

        if ($this->data->update($record, $data)) {
            Filex::delete($imageOld);
            return redirect()->route($this->routeBase . '.index');
        }

        /** jika tetap terjadi kesalahan maka ada kesalahan pada system */
        //step 1: delete image if fail to save
        Filex::delete($data['image']);

        //step 2: Kembali ke halaman input
        return redirect()->route($this->routeBase . '.edit', $id)
        ->withInput();
    }

    /** get */
    public function delete($id)
    {
        return view($this->sViewRoot.'.delete');
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

        return redirect()->route($this->routeBase . '.index');
   }

    /** get */
    public function reportDetail()
    {
        return dd('reportDetail');
        $data = $this->data->allOrderByIdDesc();

        $viewModel = Response::viewModel();
        $viewModel->data = $data;

        return view($this->sViewRoot.'.report-detail',
        ['viewModel' => $viewModel]);
    }

    /** get */
    public function reportRecap()
    {
        return dd('reportRecap');
        $data = $this->data->allOrderByIdDesc();

        $viewModel = Response::viewModel();
        $viewModel->data = $data;

        return view($this->sViewRoot.'.report-recap',
        ['viewModel' => $viewModel]);
    }

}