<?php

namespace App\Services;

use App\EventUser;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class EventUserService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
        if ($search){
            $event_users = EventUser::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $event_users = EventUser::orderBy('updated_at', 'desc')->paginate($perPage);
        }
        return $event_users;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
        /*  $values['status'] = "enabled"; */
            $event_user = EventUser::make($values);
            $event_user->save();
            DB::commit();
            return $event_user;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$event_user)
    {
       return $event_user->update($values);
    }
}
