<?php

namespace Arins\Repositories\Activitytype;

use Arins\Repositories\BaseRepository;
use Arins\Repositories\Activitysubtype\ActivitysubtypeRepositoryInterface;

class ActivitysubtypeRepository extends BaseRepository implements ActivitysubtypeRepositoryInterface
{

    public function __construct($parData)
    {
        parent::__construct($parData);

        $this->inputField = [

            'activitytype_id' => null,
            'name' => null,
            'description' => null,
            'image' => null,
            'numsort' => null,
            'status' => null
        ];

        $this->validateField = [

            //'activitytype_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => null,
            'numsort' => null,
            'status' => null
        ];

    }

    //Override parent class [BaseRepository.all()]
    public function all()
    {
        return $this->data::with(['activity', 'activitytype'])->get();;
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