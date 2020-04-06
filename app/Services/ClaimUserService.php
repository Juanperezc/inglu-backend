<?php

namespace App\Services;

use App\ClaimUser;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class ClaimUserService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
        if ($search){
            $claimUsers = ClaimUser::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $claimUsers = ClaimUser::orderBy('updated_at', 'desc')->paginate($perPage);
        }
        return $claimUsers;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
        /*  $values['status'] = "enabled"; */
            $claimUser = ClaimUser::make($values);
            $claimUser->save();
            DB::commit();
            return $claimUser;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$claimUser)
    {
        /* dd($values); */
        $claimUser->update($values);
    }
}
