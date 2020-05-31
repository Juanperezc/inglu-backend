<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteImageItem extends Model
{
   //
   protected $fillable = [
    'img', 'description','site_image_id'
];

public function site_image()
{
    return $this->belongsTo('App\SiteImageItem', 'site_image_id');
}
}
