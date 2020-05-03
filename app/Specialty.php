<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    //
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'name', 'picture', 'description', 'worker_limits',
    ];


    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    public function searchableAs()
    {
        return 'specialties_index';
    }

    public function user_workspace()
    {
        return $this->belongsToMany('App\User')->using('App\UserWorkspace')->withPivot([
            'created_at',
            'updated_at',
        ]);;
    }

}
