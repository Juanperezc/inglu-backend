<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    //
    use Searchable;

    protected $fillable = [
         'description'
    ];
    
    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id');
    }

    public function toSearchableArray()
    {
        return [
            'description' => $this->description,
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }


    public function searchableAs()
    {
        return 'post_categories_index';
    }
}

