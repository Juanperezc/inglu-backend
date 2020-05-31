<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
      //
      protected $fillable = [
        'title', 'subtitle'
   ];
   
   public function images()
   {
       return $this->hasMany('App\SiteImageItem', 'site_image_id');
   }
}
