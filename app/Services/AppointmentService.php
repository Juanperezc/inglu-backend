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
      $user = Auth::user();
      if ($user->getRoleNames()[0] == "admin"){
        if ($search){
            $appointments = Appointment::search($search)->orderBy('date', 'desc')->paginate($perPage);
        }else{
            $appointments = Appointment::orderBy('date', 'desc')->paginate($perPage);
        }
      }else{
        if ($search){
            $appointment_ids = Appointment::search($search)->orderBy('date', 'desc')->get()->pluck('id');
            $appointments = Appointment::where('id', $appointment_ids)->where('medical_staff_id', Auth::id())->orderBy('date', 'desc')->paginate($perPage);
        }else{
            $appointments = Appointment::where('medical_staff_id', Auth::id())->orderBy('date', 'desc')->paginate($perPage);
        }
      }
        /* $appointments->category()->searchable(); */
        return $appointments;
    }

    public static function my_appointments($perPage = 10 , $search)
    {
        /* dd($search); */
        $user = Auth::user();
        if ($user->type == "patient"){
        $appointments = Appointment::where('patient_id', Auth::id())->orderBy('date', 'desc')->paginate($perPage);
        }else{
        $appointments = Appointment::where('medical_staff_id', Auth::id())->orderBy('date', 'desc')->paginate($perPage);
        }

        /* $appointments->category()->searchable(); */
        return $appointments;
    }
    public static function appointment_by_user($perPage = 10 , $id){
        $appointments = Appointment::where('patient_id', $id)->orderBy('date', 'desc')->paginate($perPage);
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
            return $appointment;
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
