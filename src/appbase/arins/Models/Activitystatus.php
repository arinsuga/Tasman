<?php

namespace Arins\Models;

use Illuminate\Database\Eloquent\Model;

class Activitystatus extends Model
{

    protected $table = 'activitystatus';

    protected $fillable = ['name', 'description', 'image'];

    public function activities()
    {
        return $this->hasMany('Arins\Models\Activity');
    }

}
