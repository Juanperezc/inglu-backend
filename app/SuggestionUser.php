<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;

class SuggestionUser extends Pivot
{
    use Searchable;
    protected $table = "suggestion_user";
    protected $fillable = ['text', 'status','suggestion_id'];
    //
    public function toSearchableArray()
    {
    return [
        'id' => $this->id,
        'text' => $this->text,
        'description' => $this->suggestion ? ($this->suggestion->description) : null,
        'user' => $this->user ? ($this->user->name . " " .  $this->user->last_name) : null,
        'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y H:i'): null,
        'status' => $this->status
    ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }

    public function searchableAs()
    {
        return 'suggestion_user_index';
    }
}
