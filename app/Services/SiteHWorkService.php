<?php

namespace App\Services;

use App\SiteHWork;

use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class SiteHWorkService
{

    public static function all()
    {
        $site_h_works = SiteHWork::orderBy('updated_at', 'desc')->all();
        return $site_h_works;
    }

    public static function update(&$values, &$site_h_work)
    {
        $site_h_work->update($values);
    }
}
