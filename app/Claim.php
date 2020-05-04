<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model
{
    use Searchable;
   /*  use SoftDeletes; */
    protected $fillable = [
        'type', 'description',
    ];


    public function toSearchableArray()
    {
    return [
        'id' => $this->id,
        'type' => $this->type,
        'description' => $this->claim ? ($this->claim->description) : null,
        'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y H:i'): null,
    ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class,
            'claim_user',
            'claim_id', // you might need to switch place with this one and the one below
            'user_id', // Can nenver remember how these goes
            'id')->using('App\ClaimUser')->withPivot([
            'text',
            'status',
        ])->withTimestamps();
    }

    public function searchableAs()
    {
        return 'claims_index';
    }
    //
}
