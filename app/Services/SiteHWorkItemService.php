<?php

namespace App\Services;


use App\SiteHWorkItem;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Notification;

class SiteHWorkItemService
{

    public static function all($perPage = 10 , $search)
    {
            $site_h_work_items = SiteHWorkItem::orderBy('updated_at', 'desc')->paginate($perPage);
        /* $site_h_work_items->category()->searchable(); */
        return $site_h_work_items;
    }
  
    public static function store(&$values)
    {
          try {
            DB::beginTransaction();
            $site_h_work_item = SiteHWorkItem::make($values);
            $site_h_work_item->save();
            DB::commit();
            return $site_h_work_item;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        } 
    }

    public static function update(&$values, &$site_h_work_item)
    {
        $site_h_work_item->update($values);
    }
}
