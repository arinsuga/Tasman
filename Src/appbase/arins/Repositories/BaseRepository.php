<?php

namespace Arins\Repositories;

//use App\User;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $data;

    public function __construct($parData)
    {
        $this->data = $parData;
    }

    public function all()
    {
        return $this->data->all();
    }

    function find($id)
    {
        return $this->data->find($id);
    }

    public function create($parData)
    {
        return $this->data->all();
    }

    public function getInstant()
    {
        return $this->data;
    }

    public function allOrderByIdDesc()
    {
        return $this->data
               ->orderBy('id', 'desc')
               ->get();
    }

    public function allOrderByDateAndIdDesc()
    {
        return $this->data
               ->orderBy('date', 'desc')
               ->orderBy('id', 'desc')
               ->get();
    }

    public function allOrderByDateAndIdDescTake($numberOfRecords)
    {
        return $this->data
               ->orderBy('date', 'desc')
               ->orderBy('id', 'desc')
               ->take($numberOfRecords)
               ->get();
    }

}