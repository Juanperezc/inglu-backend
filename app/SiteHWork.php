<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteHWork extends Model
{
     //
     protected $fillable = [
        'title', 'subtitle'
   ];
   
   public function items()
   {
       return $this->hasMany('App\SiteHWorkItem', 'site_h_work_id');
   }
}
