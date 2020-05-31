<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteTeam extends Model
{
    //
    protected $fillable = [
        'title', 'subtitle'
   ];
   
   public function members()
   {
       return $this->hasMany('App\SiteTeamMember', 'site_team_id');
   }
}
