<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInformation extends Model
{
    protected $fillable = [
        'title', 'description','img'
    ];
}
