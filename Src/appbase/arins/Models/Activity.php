<?php

namespace Arins\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $table = 'activity';

    protected $fillable = ['activitytype_id', 'name', 'description', 'image', 'startdt', 'enddt'];

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

}
