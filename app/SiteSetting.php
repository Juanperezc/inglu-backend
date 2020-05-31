<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    //
    protected $fillable = [
        'title', 'subtitle', "playstore_url", 'linkedin_url',
        'facebook_url', 'twitter_url'
   ];
}
