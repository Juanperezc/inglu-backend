<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    //
    use Searchable;
    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id');
    }

    public function searchableAs()
    {
        return 'post_categories_index';
    }
}

