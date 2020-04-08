<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    //
    protected $fillable = [
        'type', 'description',
    ];
    
    use Searchable;
    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\SuggestionUser')->withPivot([
            'text',
            'status',
        ])->withTimestamps();
    }
}
