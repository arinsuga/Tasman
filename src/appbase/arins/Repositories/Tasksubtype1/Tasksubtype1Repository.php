<?php

namespace Arins\Repositories\Tasksubtype1;

use Arins\Repositories\BaseRepository;
use Arins\Repositories\Tasksubtype1\Tasksubtype1RepositoryInterface;

class Tasksubtype1Repository extends BaseRepository implements Tasksubtype1RepositoryInterface
{

    public function __construct($parData)
    {
        parent::__construct($parData);

        $this->inputField = [
            'activitytype_id' => null,
            'tasktype_id' => null,
            'name' => null,
            'description' => null,
            'image' => null,
            "numsort" => null,
            'status' => null
        ];
    
        $this->validateInput = [
            'tasktype_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ];
    
        $this->validateField = [
            'activitytype_id' => 'required',
            'tasktype_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            "numsort" => 'required',
            'status' => 'required'
        ];
    }

    public function byActivitytype($id)
    {
        return $this->model->where('activitytype_id', $id)->get();
    }

}