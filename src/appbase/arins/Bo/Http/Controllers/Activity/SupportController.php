<?php

namespace Arins\Bo\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arins\Http\Controllers\BoController;
use Arins\Traits\Http\Controller\Base;
use Arins\Bo\Http\Controllers\Activity\Support\Pending;
use Arins\Bo\Http\Controllers\Activity\Support\Cancel;
use Arins\Bo\Http\Controllers\Activity\Support\Close;

use Arins\Repositories\Activity\ActivityRepositoryInterface;

use Arins\Repositories\Activitysubtype\ActivitysubtypeRepositoryInterface;
use Arins\Repositories\Tasktype\TasktypeRepositoryInterface;
use Arins\Repositories\Tasksubtype1\Tasksubtype1RepositoryInterface;
use Arins\Repositories\Tasksubtype2\Tasksubtype2RepositoryInterface;
use Arins\Repositories\Employee\EmployeeRepositoryInterface;

class SupportController extends BoController
{

    use Base, Close, Pending, Cancel;

    // protected $sViewRoot;
    // protected $data, $dataActivitytype;
    protected $activitytype_id;
    protected $dataActivitysubtype;
    protected $dataTasktype;
    protected $dataTasksubtype1;
    protected $dataTasksubtype2;
    protected $dataEmployee;


    public function __construct(ActivityRepositoryInterface $parData,
                                ActivitysubtypeRepositoryInterface $parActivitysubtype,
                                TasktypeRepositoryInterface $parTasktype,
                                Tasksubtype1RepositoryInterface $parTasksubtype1,
                                Tasksubtype2RepositoryInterface $parTasksubtype2,
                                EmployeeRepositoryInterface $parEmployee)
    {
        parent::__construct('support');

        $this->activitytype_id = 1; //support
        $this->data = $parData;
        $this->dataActivitysubtype = $parActivitysubtype;
        $this->dataTasktype = $parTasktype;
        $this->dataTasksubtype1 = $parTasksubtype1;
        $this->dataTasksubtype2 = $parTasksubtype2;
        $this->dataEmployee = $parEmployee;

        $this->dataModel = [
            'activitysubtype' => $this->dataActivitysubtype->byActivitytype($this->activitytype_id),
            'tasktype' => $this->dataTasktype->all(),
            'tasksubtype1' => $this->dataTasksubtype1->all(),
            'tasksubtype2' => $this->dataTasksubtype2->all(),
            'enduser' => $this->dataEmployee->all(),
            'technician' => $this->dataEmployee->all()
        ];        
    }

    protected function transformField($paDataField) {
        $dataField = $paDataField;
        $dataField['activitytype_id'] = 1; //Support
        $dataField['activitystatus_id'] = 1; //open

        $employee = $this->dataEmployee->find($dataField['enduser_id']);
        if ($employee != null)
        {
            $dataField['enduserdept_id'] = $employee->dept_id;
        }
        $dataField['startdt'] = now();

        return $dataField;
    }

    protected function responseView($viewName)
    {
        $this->aResponseData = [
            'viewModel' => $this->viewModel,
            'new' => false,
            'fieldEnabled' => true,
            'dataModel' => $this->dataModel
        ];

        foreach ($this->dataModel as $key => $value) {

            $this->aResponseData[$key] = $value;

        } //end loop

        return view($this->sViewRoot . '.' . $viewName, $this->aResponseData);
    }

    protected function updateResult(Request $request, $id, $activityStatusId = null)
    {
        //get data from database
        $record = $this->data->find($id);
        $record->activitystatus_id = $activityStatusId;

        //get input value by fillable fields
        $data = $request->only($this->data->getFillable()); //get field input

        //validate input value (validate resolution)
        if ($activityStatusId == 2)
        {
            $record->resolution = $request->input('resolution');
            // $request->validate(['resolution' => 'required']);
        } //end if

        if ($this->data->update($record, $data)) {
            return 0; //success
        }

        /** jika tetap terjadi kesalahan maka ada kesalahan pada system */
        //step 2: Kembali ke halaman input
        return 2; //fail of exception
    }

}
