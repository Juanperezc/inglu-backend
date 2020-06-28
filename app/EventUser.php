<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;
class EventUser extends Pivot
{
    //
    use Searchable;
    protected $table = 'event_user';
    protected $fillable = [
        'event_id', 'user_id',
        'comment', 'qualification', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

  /*   public function specialty()
    {
        return $this->belongsTo('App\Specialty');
    }
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
    public function time()
    {
        return $this->hasOne('App\UserWorkspaceTime', 'user_workspace_id');
    } */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'qualification' => $this->qualification,
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
            'user' => $this->user ? ($this->user->name . " " .  $this->user->last_name) : null,
            'event' => $this->event ? ($this->event->name) : null
        ];
    }

    public function searchableAs()
    {
        return 'event_user_index';
    }
}
