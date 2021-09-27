<?php

namespace Arins\Repositories;

interface BaseRepositoryInterface
{
    function all();
    function find($id);

    function getFillable();
    function getInputField();
    function getValidateField();
    function getRecord();

    function create($parData);
    function update($parData);
    function delete();

    function allOrderByIdDesc();
    function allOrderByDateAndIdDesc();
    function allOrderByDateAndIdDescTake($numberOfRecords);

}