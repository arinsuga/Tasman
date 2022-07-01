<?php

namespace Arins\Repositories\Activity;

use Arins\Repositories\BaseRepository;
use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Carbon\Carbon;

class ActivityRepository extends BaseRepository implements ActivityRepositoryInterface
{
    public function __construct($parData)
    {
        parent::__construct($parData);

        $this->inputField = [
            'activitytype_id' => null,
            'activitysubtype_id' => null,
            'activitystatus_id' => null,
            'tasktype_id' => null,
            'tasksubtype1_id' => null,
            'tasksubtype2_id' => null,
            'name' => null,
            'subject' => null,
            'description' => null,
            'resolution' => null,
            'image' => null,
            'startdt' => null,
            'enddt' => null,
            'enduser_id' => null,
            'enduserdept_id' => null,
            'endusersubdept_id' => null,
            'technician_id' => null
        ];

        $this->validateInput = [
            //remarkfortes 'activitysubtype_id' => 'required',
            //remarkfortes 'tasktype_id' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ];

        $this->validateField = [
            //code array here...
            'startdt' => 'required',
            'activitytype_id' => 'required',
            //remarkfortes 'activitysubtype_id' => 'required',
            //remarkfortes 'tasktype_id' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ];

    }

    function byActivitytypeCustom($id, $request, $take=null) 
    {
        $result = $this->model::where('activitytype_id', $id);
        



        if ($take == null) {
            $result = $result->get();
        } else {
            $result = $result->take($take)->get();
        }

        return $result;
    }
    
    public function byActivitytype($id, $take=null)
    {
        if ($take == null) {
            return $this->model::where('activitytype_id', $id)->get();
        } else {
            return $this->model::where('activitytype_id', $id)
            ->take($take)
            ->get();
        }
    }

    public function byActivitytypeOrderByIdAndStartdtDesc($id, $take=null)
    {
        if ($take == null) {

            return $this->model::where('activitytype_id', $id)
            ->orderBy('startdt', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        } else {
            return $this->model::where('activitytype_id', $id)
            ->take($take)
            ->get();
        }
    }

    public function byActivitytypeStatusOpenOrderByIdAndStartdtDesc($id, $take=null)
    {
        if ($take == null) {

            return $this->model::where('activitytype_id', $id)
            ->where('activitystatus_id', 1)
            ->orderBy('startdt', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        } else {
            return $this->model::where('activitytype_id', $id)
            ->where('activitystatus_id', 1)
            ->take($take)
            ->get();
        }
    }

    public function byActivitytypeTodayOrderByIdAndStartdtDesc($id, $take=null)
    {
        if ($take == null) {

            return $this->model::where('activitytype_id', $id)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('startdt', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        } else {
            return $this->model::where('activitytype_id', $id)
            ->take($take)
            ->get();
        }
    }

    //override parent method
    public function allOrderByDateAndIdDesc()
    {
        return $this->model
               ->orderBy('startdt', 'desc')
               ->orderBy('id', 'desc')
               ->get();
    }


    // public function countActivityByActivityType() {

    //     return 'hasil dari function countActivityByActivityType';

    // }

}