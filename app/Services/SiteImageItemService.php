<?php

namespace App\Services;


use App\SiteImageItem;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Notification;

class SiteImageItemService
{

    public static function all($perPage = 10 , $search)
    {
            $site_image_items = SiteImageItem::orderBy('updated_at', 'desc')->paginate($perPage);
        /* $site_image_items->category()->searchable(); */
        return $site_image_items;
    }
  
    public static function store(&$values)
    {
          try {
            DB::beginTransaction();
            $site_image_item = SiteImageItem::make($values);
            $site_image_item->save();
            DB::commit();
            return $site_image_item;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        } 
    }

    public static function update(&$values, &$site_image_item)
    {
        $site_image_item->update($values);
    }
}
