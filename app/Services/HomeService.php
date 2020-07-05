<?php

namespace App\Services;

use App\Contact;
use App\Appointment;
use App\User;
use App\Specialty;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;
/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Carbon;



class HomeService
{

    
    public static function index()
    {
        /* dd($search); */
        $user = Auth::user();
        if ($user->getRoleNames()[0] == "admin"){
            $appointment_counts = Appointment::count();
            $patient_counts = User::where('type', 1)->count();
            $doctor_counts = User::where('type', 2)->count();
        
        //? patient_ages
            $c_10 = User::where('date_of_birth','<=',date('Y-m-d', strtotime('0 years')))->where('date_of_birth','>=',date('Y-m-d', strtotime('-10 years')))->where('type',1)->count();
            $c_20 = User::where('date_of_birth','<=',date('Y-m-d', strtotime('10 years')))->where('date_of_birth','>=',date('Y-m-d', strtotime('-20 years')))->where('type',1)->count();
            $c_30 = User::where('date_of_birth','<=',date('Y-m-d', strtotime('20 years')))->where('date_of_birth','>=',date('Y-m-d', strtotime('-30 years')))->where('type',1)->count();
            $c_40 = User::where('date_of_birth','<=',date('Y-m-d', strtotime('30 years')))->where('date_of_birth','>=',date('Y-m-d', strtotime('-40 years')))->where('type',1)->count();
            $c_40m = User::where('date_of_birth','>=',date('Y-m-d', strtotime('-40 years')))->where('type',1)->count();
            $patient_ages = 
            [
             ["value" => $c_10, "name" => '0-10'],
             ["value" => $c_20, "name" => '10-20'],
             ["value" => $c_30, "name" => '20-30'],
             ["value" => $c_40, "name" => '30-40'],
             ["value" => $c_40m, "name" => '40+']
            ];

            //? patient_gender

            $g_f = User::where('type', 1)->where('gender', 'female')->count();
            $g_m = User::where('type', 1)->where('gender', 'male')->count();

            $patient_gender = 
            [
                [  "value" => $g_f, "name" => 'Femenino'],
                [ "value" => $g_m, "name" => 'Masculino']
            ];

             //? specialties
            $specialties = Specialty::with(['users','users:name'])->select('id','name')->get();
            $specialties_arr = [];
            foreach ($specialties as $specialty) {
                $value =
                ["name" => $specialty->name,
                "value" => count($specialty->users)];
                array_push($specialties_arr, $value);
                // Code Here
            }

            return [
            "specialties" => $specialties_arr,
            "patient_gender" => $patient_gender,
            "patient_ages" => $patient_ages,
            "appointment_counts" => $appointment_counts,
            "patient_counts" => $patient_counts,
            "doctor_counts" => $doctor_counts
            ];
        }else{
            $appointment_counts = Appointment::where('medical_staff_id', Auth::id)->count();
            return [
            "specialties" => [],
            "patient_gender" => [],
            "patient_ages" => [],
            "appointment_counts" => $appointment_counts,
            "patient_counts" => [],
            "doctor_counts" => []
            ];
        }
    }

}
