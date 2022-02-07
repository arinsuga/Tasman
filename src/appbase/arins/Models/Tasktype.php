<?php

namespace Arins\Models;

use Illuminate\Database\Eloquent\Model;

class Activitytype extends Model
{

    protected $table = 'tasktype';

    protected $fillable = ['activitytype_id', 'name', 'description', 'image', 'numsort', 'status'];

}
