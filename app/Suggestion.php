<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\SuggestionUser')->withPivot([
            'text',
            'status',
        ])->withTimestamps();
    }
}
