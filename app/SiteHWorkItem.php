<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteHWorkItem extends Model
{
     //
     protected $fillable = [
        'img', 'title', 'description','site_h_work_id'
    ];
    
    public function site_h_work()
    {
        return $this->belongsTo('App\SiteHWork', 'site_h_work_id');
    }
}
