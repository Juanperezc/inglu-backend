<?php

namespace App\Services;

use App\Specialty;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
/* use App\Transaction; */

class SpecialtyService
{


    public static function all($perPage = 10, $search)
    {
        if ($search) {
            $specialty = Specialty::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        } else {
            $specialty = Specialty::orderBy('updated_at', 'desc')->paginate($perPage);
        }

        return $specialty;
    }
  

    public static function update(&$values, &$specialty)
    {
        $specialty->update($values);
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
            /*  $values['status'] = "enabled"; */
            $specialty = Specialty::make($values);
            $specialty->save();
            DB::commit();
            return $specialty;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
