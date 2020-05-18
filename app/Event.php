<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use Searchable;
    use SoftDeletes;
    protected $dates = ['date', 'updated_at', 'created_at'];
    protected $fillable = [
        "name", "picture", "description", "date", "limit", "type",
        "location", "status", 'doctor_id'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctor_id');
    }


    public function users()
    {
        return $this->belongsToMany('App\User', 'event_user')->using('App\EventUser')->withPivot([
            'created_at',
            'updated_at',
            'comment',
            'qualification',
            'status'
        ]);
    }

    public function toSearchableArray()
    {
        return [
            "name" => $this->name,
            "picture" => $this->picture,
            "description" =>$this->description,
            "date" => $this->date,
            "limit" =>$this->limit,
            "type" => $this->type,
            "location" => $this->location,
            "status" => $this->status,
        ];
    }

    public function searchableAs()
    {
        return 'events_index';
    }
}
