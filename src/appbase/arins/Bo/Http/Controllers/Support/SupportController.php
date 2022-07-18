<?php

namespace Arins\Bo\Http\Controllers\Support;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

use Arins\Bo\Http\Controllers\Activity\ActivityController;

use Arins\Repositories\Activity\ActivityRepositoryInterface;
    
use Arins\Repositories\Activitystatus\ActivitystatusRepositoryInterface;
use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Arins\Repositories\Activitysubtype\ActivitysubtypeRepositoryInterface;
use Arins\Repositories\Tasktype\TasktypeRepositoryInterface;
use Arins\Repositories\Tasksubtype1\Tasksubtype1RepositoryInterface;
use Arins\Repositories\Tasksubtype2\Tasksubtype2RepositoryInterface;
use Arins\Repositories\Employee\EmployeeRepositoryInterface;
use Arins\Repositories\Technician\TechnicianRepositoryInterface;

use Arins\Facades\Response;

class SupportController extends ActivityController
{

    public function __construct(ActivityRepositoryInterface $parData,
                                ActivitystatusRepositoryInterface $parActivitystatus,
                                ActivitytypeRepositoryInterface $parActivitytype,
                                ActivitysubtypeRepositoryInterface $parActivitysubtype,
                                TasktypeRepositoryInterface $parTasktype,
                                Tasksubtype1RepositoryInterface $parTasksubtype1,
                                Tasksubtype2RepositoryInterface $parTasksubtype2,
                                EmployeeRepositoryInterface $parEmployee,
                                TechnicianRepositoryInterface $parTechnician)
    {
        $this->uploadDirectory = 'support';
        $this->sViewName = 'support';
        $this->activitytype_id = 1; //support

        parent::__construct(
            $parData,
            $parActivitystatus,
            $parActivitytype,
            $parActivitysubtype,
            $parTasktype,
            $parTasksubtype1,
            $parTasksubtype2,
            $parEmployee,
            $parTechnician
        );

    } //end construct


    /** close */
    public function changeActivitysubtype($id)
    {
        //Check if additional data exist
        if (method_exists($this, 'editAdditionalData')) {
            $additionalData = $this->editAdditionalData($id);
        } //end if

        $this->processEdit($id);

        return $this->responseView('close', false, false, true);
    }

    /** post */
    public function updateChangeActivitysubtype(Request $request, $id)
    {
        $processResult = $this->updateResult($request, $id, 2);
        return $this->runResponseMethod('update', $processResult, $id);
    }

    protected function updateActivitysubtype(Request $request, $id, $activityStatusId = null)
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
            $request->validate(['resolution' => 'required']);
        } //end if

        if ($activityStatusId != 4)
        {
            $data['enddt'] = now();
        }

        if ($this->data->update($record, $data)) {
            return 0; //success
        }

        /** jika tetap terjadi kesalahan maka ada kesalahan pada system */
        //step 2: Kembali ke halaman input
        return 2; //fail of exception
    }

} //end class
