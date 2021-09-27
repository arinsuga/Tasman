<?php

namespace Arins\Repositories;

interface BaseRepositoryInterface
{
    function all();
    function find($id);
    function getFillable();
    function getInstant();

    function create($parData);
    function update($parData);

    function allOrderByIdDesc();
    function allOrderByDateAndIdDesc();
    function allOrderByDateAndIdDescTake($numberOfRecords);

}