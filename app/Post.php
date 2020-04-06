<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'photo','category_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo
        ('App\PostCategory', 'category_id');
    }

    public function toSearchableArray()
    {
      /*   $array = $this->toArray(); */
        return [
           /*  'id' => $this->id, */
            'title' => $this->title,
            'description' => $this->description,
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
            /* 'photo' => $this->photo, */
            'category' => $this->category["description"],
        ];
        

        // Customize array...

    /*     return $array; */
    }

    public function searchableAs()
    {
        return 'posts_index';
    }
}
