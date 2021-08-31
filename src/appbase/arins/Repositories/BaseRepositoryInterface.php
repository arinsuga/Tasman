<?php

namespace Arins\Repositories;

interface BaseRepositoryInterface
{
    function all();
    function find($id);
    function create($parData);
    function getInstant();

    function allOrderByIdDesc();
    function allOrderByDateAndIdDesc();
    function allOrderByDateAndIdDescTake($numberOfRecords);

}