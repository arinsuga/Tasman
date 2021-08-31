<?php

namespace Arins\Repositories\Activity;

use Arins\Repositories\BaseRepositoryInterface;

//Inherit interface to BaseRepositoryInterface
interface ActivityRepositoryInterface extends BaseRepositoryInterface
{
    function byActivitytype($id, $take=null);
}