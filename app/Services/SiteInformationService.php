<?php

namespace App\Services;

use App\SiteInformation;

use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class SiteInformationService
{

    public static function all()
    {
        $site_informations = SiteInformation::orderBy('updated_at', 'desc')->all();
        return $site_informations;
    }

    public static function update(&$values, &$site_information)
    {
        $site_information->update($values);
    }
}
