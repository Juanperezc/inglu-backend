<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteTeamMember extends Model
{
    //
    protected $fillable = [
        'img', 'name', 'role', 'site_team_id'
   ];
   
    public function site_team()
    {
        return $this->belongsTo('App\SiteTeamMember', 'site_team_id');
    }
}
