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
            'name' => null,
            'description' => null,
            'image' => null,
            'startdt' => null,
            'enddt' => null,
        ];

        $this->validateFields = [
            //code array here...
            'startdt' => 'required',
            'enddt' => 'required',
            'activitytype_id' => 'required',
            'description' => 'required',
        ];

    }

    //Override parent class [BaseRepository.all()]
    public function all()
    {
        return $this->data::with('activity')->get();;
    }

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