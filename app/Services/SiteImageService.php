<?php

namespace App\Services;

use App\SiteImage;

use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class SiteImageService
{

    public static function all()
    {
        $site_images = SiteImage::orderBy('updated_at', 'desc')->all();
        return $site_images;
    }

    public static function update(&$values, &$site_image)
    {
        $site_image->update($values);
    }
}
