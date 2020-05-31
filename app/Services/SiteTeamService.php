<?php

namespace App\Services;

use App\SiteTeam;

use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class SiteTeamService
{

    public static function all()
    {
        $site_teams = SiteTeam::orderBy('updated_at', 'desc')->all();
        return $site_teams;
    }

    public static function update(&$values, &$site_team)
    {
        $site_team->update($values);
    }
}
