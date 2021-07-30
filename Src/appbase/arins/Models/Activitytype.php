<?php

namespace Arins\Models;

use Illuminate\Database\Eloquent\Model;

class Activitytype extends Model
{

    public function activities()
    {
        return $this->hasMany('Arins\Models\Activity');
    }

}
