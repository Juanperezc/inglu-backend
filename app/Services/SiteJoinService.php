<?php

namespace App\Services;

use App\SiteJoin;

use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class SiteJoinService
{

    public static function all()
    {
        $site_joins = SiteJoin::orderBy('updated_at', 'desc')->all();
        return $site_joins;
    }

    public static function update(&$values, &$site_join)
    {
        $site_join->update($values);
    }
}
