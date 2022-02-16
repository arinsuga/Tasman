<?php

namespace Arins\Repositories\Activity;

use Arins\Repositories\BaseRepository;
use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;

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

    // //Override parent class [BaseRepository.all()]
    // public function all()
    // {
    //     return $this->data::with('activity')->get();;
    // }

    public function byActivitytype($id, $take=null)
    {
        if ($take == null) {
            return $this->data::where('activitytype_id', $id)->get();
        } else {
            return $this->data::where('activitytype_id', $id)
            ->take($take)
            ->get();
        }
    }

    public function countActivityByActivityType() {

        return 'hasil dari function countActivityByActivityType';

    }

}