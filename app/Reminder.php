<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    //
   use SoftDeletes;

   protected $fillable = [
        'title','description','date','user_id','status'
   ];

   public function user()
   {
       return $this->belongsTo('App\User', 'user_id');
   }
}
