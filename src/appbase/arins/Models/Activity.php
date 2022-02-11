<?php

namespace Arins\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $table = 'activity';

    protected $fillable = [
        'activitytype_id',
        'activitysubtype_id',
        'tasktype_id',
        'tasksubtype1_id',
        'tasksubtype2_id',
        'name',
        'subject',
        'description',
        'image',
        'startdt',
        'enddt'
    ];

    protected $dates = [
        'startdt',
        'enddt',
        'created-at',
        'updated_at',
    ];

    public function activitytype()
    {
        return $this->belongsTo('Arins\Models\Activitytype');
    }

    public function activitysubtype()
    {
        return $this->belongsTo('Arins\Models\Activitysubtype');
    }

    public function activitystatus()
    {
        return $this->belongsTo('Arins\Models\Activitystatus');
    }

    public function tasktype()
    {
        return $this->belongsTo('Arins\Models\Tasktype');
    }

}
