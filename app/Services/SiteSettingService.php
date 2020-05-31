<?php

namespace App\Services;

use App\SiteSetting;

use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class SiteSettingService
{

    public static function all()
    {
        $site_settings = SiteSetting::orderBy('updated_at', 'desc')->all();
        return $site_settings;
    }

    public static function update(&$values, &$site_setting)
    {
        $site_setting->update($values);
    }
}
