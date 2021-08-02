<?php

namespace Arins\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $table = 'activity';

    protected $fillable = ['activitytype_id', 'name', 'description', 'image'];

    public function activitytype()
    {
        return $this->belongsTo('Arins\Models\Activitytype');
    }

}
