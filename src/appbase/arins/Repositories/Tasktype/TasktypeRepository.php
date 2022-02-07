<?php

namespace Arins\Repositories\Tasktype;

use Arins\Repositories\BaseRepository;
use Arins\Repositories\Tasktype\TasktypeRepositoryInterface;

class TasktypeRepository extends BaseRepository implements TasktypeRepositoryInterface
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
    
        $this->validateInput = [
            'activitytype_id' => null,
            'name' => 'required',
            'description' => 'required',
            'image' => null,
            'numsort' => null,
            'status' => null
        ];
    
        $this->validateField = [
            'activitytype_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => null,
            'numsort' => 'required',
            'status' => 'required'
        ];
    }

    //Override parent class [BaseRepository.all()]
    public function all()
    {
        return $this->model::with(['activity', 'activitytype'])->get();;
    }

}