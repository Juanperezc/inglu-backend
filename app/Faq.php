<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Faq extends Model
{
    use Searchable;
    protected $fillable = [
        'question', 'answer',
    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'answer' => $this->answer,
            'question' => $this->question,
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }

    public function searchableAs()
    {
        return 'faqs_index';
    }
    //
}
