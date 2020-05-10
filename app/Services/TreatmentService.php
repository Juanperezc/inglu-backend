<?php

namespace App\Services;

use App\Treatment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class TreatmentService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
      
        if ($search){
            $treatments = Treatment::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $treatments = Treatment::orderBy('updated_at', 'desc')->paginate($perPage);
        }
   
        /* $treatments->category()->searchable(); */
        return $treatments;
    }

    public static function store(&$values)
    {
          try {
            DB::beginTransaction();
            /* $values["date"] = Carbon::parse($values["date"]); */
            $treatment = Treatment::make($values);
            $treatment->save();
            DB::commit();
            return $treatment;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        } 
    }

    public static function update(&$values, &$treatment)
    {
        $treatment->update($values);
    }
}
