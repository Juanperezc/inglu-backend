<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;

class ClaimUser extends Pivot
{
    use Searchable;
    protected $fillable = [
        'text', 'status',
    ];
    protected $table = "claim_user";
    //
    public function toSearchableArray()
    {
    return [
        'id' => $this->id,
        'text' => $this->text,
        'description' => $this->claim ? ($this->claim->description) : null,
        'user' => $this->user ? ($this->user->name . " " .  $this->user->last_name) : null,
        'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y H:i'): null,
        'status' => $this->status
    ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function searchableAs()
    {
        return 'claim_user_index';
    }
}
