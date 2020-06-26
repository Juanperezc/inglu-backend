<?php

namespace App\Services;

use App\Event;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class EventService
{

    public static function all($perPage = 10 , $search, $type= null)
    {
        /* dd($search); */
        if ($search){
            $events = Event::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            if ($type != null && $type != "null"){
                $events = Event::where('type', $type)->orderBy('updated_at', 'desc')->paginate($perPage);
            }else{
                $events = Event::orderBy('updated_at', 'desc')->paginate($perPage);
            }
           
        }
        return $events;
    }

    public static function my_events($perPage = 10 , $search,$type=null)
    {
        /* dd($search); */
        if ($type != null && $type != "null"){
            $events = Auth::user()->events()->where('type', $type)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $events = Auth::user()->events()->orderBy('updated_at', 'desc')->paginate($perPage);
        }
      
        /* $events->category()->searchable(); */
        return $events;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
        /*  $values['status'] = "enabled"; */
            $event = Event::make($values);
            $event->save();
            DB::commit();
            return $event;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$event)
    {
        $event->update($values);
    }

    public static function join(&$event)
    {
        $user_id = Auth::id();
        $event->users()->attach([$user_id]);
    }
}
