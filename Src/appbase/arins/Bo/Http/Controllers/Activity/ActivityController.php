<?php

namespace Arins\Bo\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Arins\Repositories\Activity\ActivityRepositoryInterface;
use Arins\Facades\Response;
use Arins\Facades\Filex;

class ProductsubtypeController extends Controller
{

    protected $sViewRoot;
    protected $data, $dataActivitytype;
    protected $dataModel;
    protected $validateFields;


    /**
     * Create a new controller instance.
     *
     * Method Name: Constructor
     * 
     * @return void
     */
    public function __construct(ActivitytypeRepositoryInterface $parData,
                                ActivityRepositoryInterface $parActivitytype)
    {
        $this->middleware('auth.admin');
        $this->middleware('is.admin');

        $psViewRoot = 'bo.Activity';
        $this->sViewRoot = $psViewRoot;
        $this->data = $parData;
        $this->dataActivitytype = $parActivitytype;
        $this->validateFields = [
            //code array here...
            'activitytype_id' => 'required',
            'name' => 'required',
        ];
        
    }

    /**
     * Method Name: index
     * 
     * http method: GET
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->data->allOrderByIdDesc();
        $viewModel = Response::viewModel();
        $viewModel->data = $data;

        return view($this->sViewRoot.'.index',
        ['viewModel' => $viewModel]);
    }

    /**
     * Method Name: show
     * 
     * http method: GET
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->data->find($id);
        $viewModel = Response::viewModel();
        $viewModel->data = $data;

        //return dd($viewModel->data->producttype->name);

        return view($this->sViewRoot.'.show',
        ['viewModel' => $viewModel, 'new' => false, 'fieldEnabled' => false]);
    }

    /**
     * Method Name: create
     * 
     * http method: GET
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'activitytype_id' => null,
            'name' => null,
            'description' => null,
            'image' => null,
        ];
        $viewModel = Response::viewModel();
        $viewModel->data = json_decode(json_encode($data));
        $viewModel->data->date = now();

        return view($this->sViewRoot.'.create',
        ['viewModel' => $viewModel, 'new' => true, 'fieldEnabled' => true,
        'activitytype' => $this->dataActivitytype->all()]);
    }

    /**
     * Method Name: edit
     * 
     * http method: GET
     * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->data->find($id);
        $viewModel = Response::viewModel();
        $viewModel->data = $data;

        return view($this->sViewRoot.'.edit',
        ['viewModel' => $viewModel, 'new' => false, 'fieldEnabled' => true,
        'activitytype' => $this->dataActivitytype->all()]);
    }

    /**
     * Method Name: delete
     * 
     * http method: GET
     * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        return view($this->sViewRoot.'.delete');
    }

    /**
     * Method Name: store
     * 
     * http method: POST
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate($this->validateFields);

        $model = $this->data->getInstant();
        $data = $request->only($model->getFillable());

        $path = '';
        $upload = $request->file('upload');
        if ($upload) {
            $path = $upload->store('activities', 'public');
        }
        
        if ($path != '')
        {
            $data['image'] = $path;
        }
        
        $model->fill($data)->save();

        return redirect()->route('activity.index');
    }

    /**
     * Method Name: udate
     * 
     * http method: POST
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate($this->validateFields);

        $model = $this->data->find($id);
        $data = $request->only($model->getFillable());
        $upload = $request->file('upload');
        $toggleRemoveImage = $request->input('toggleRemoveImage');

        $data['image'] = Filex::uploadOrRemove($model->image, 'activities', $upload, 'public', $toggleRemoveImage);

        $model->fill($data)->save();
                
        return redirect()->route('activity.index');
    }

    /**
     * Method Name: destroy
     * 
     * http method: POST
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = $this->data->find($id);
        $fileName = $model->image;
        $model->delete();
        Filex::delete($fileName);

        return redirect()->route('activity.index');
   }
}
