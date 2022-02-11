<?php

namespace Arins\Models;

use Illuminate\Database\Eloquent\Model;

class Activitytype extends Model
{

    protected $table = 'activitytype';

    protected $fillable = ['name', 'description', 'image'];

    public function activities()
    {
        return $this->hasMany('Arins\Models\Activity');
    }

    public function activitysubtypes()
    {
        return $this->hasMany('Arins\Models\Activitysubtype');
    }

    public function tasktypes()
    {
        return $this->hasMany('Arins\Models\Tasktype');
    }
}
