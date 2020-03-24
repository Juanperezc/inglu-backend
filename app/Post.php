<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use Searchable;

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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $this->photo,
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
