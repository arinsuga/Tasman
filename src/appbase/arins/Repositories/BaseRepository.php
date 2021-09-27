<?php

namespace Arins\Repositories;

//use App\User;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $data, $record, $records;

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

        $this->record = $this->data->find($id);
        return $this->record;
    }

    public function getFillable()
    {
        return $this->data->getFillable();
    }

    public function create($parData)
    {
        return $this->data->fill($parData)->save();
    }

    public function update($parData)
    {
        return $this->record->fill($parData)->save();
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