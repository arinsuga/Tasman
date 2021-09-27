<?php

namespace Arins\Repositories;

//use App\User;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $data, $record;
    protected $inputField, $validateFields;

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
        if ($this->record) {
            return true;
        }

        return false;
    }

    public function getFillable()
    {
        return $this->data->getFillable();
    }

    public function getInputField()
    {
        return $this->inputField;
    }

    public function getValidateField()
    {
        return $this->validateField;
    }

    public function getRecord()
    {
        return $this->record;
    }

    public function create($parData)
    {
        return $this->data->fill($parData)->save();
    }

    public function update($parData)
    {
        return $this->record->fill($parData)->save();
    }

    public function delete()
    {
        return $this->record->delete();
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