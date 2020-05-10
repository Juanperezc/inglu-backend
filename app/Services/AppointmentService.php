<?php

namespace App\Services;

use App\Appointment;
use Illuminate\Support\Carbon;
use App\AppointmentCategory;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class AppointmentService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
      
        if ($search){
            $appointments = Appointment::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $appointments = Appointment::orderBy('updated_at', 'desc')->paginate($perPage);
        }
   
        /* $appointments->category()->searchable(); */
        return $appointments;
    }

    public static function store(&$values)
    {
          try {
            DB::beginTransaction();
            /* $values["date"] = Carbon::parse($values["date"]); */
            $appointment = Appointment::make($values);
            $appointment->save();
            DB::commit();
            return $values["date"];
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        } 
    }

    public static function update(&$values, &$appointment)
    {
        $appointment->update($values);
    }
}
