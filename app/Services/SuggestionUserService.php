<?php

namespace App\Services;

use App\SuggestionUser;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class SuggestionUserService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
        if ($search){
            $suggestionUsers = SuggestionUser::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $suggestionUsers = SuggestionUser::orderBy('updated_at', 'desc')->paginate($perPage);
        }
        return $suggestionUsers;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
        /*  $values['status'] = "enabled"; */
            $values["user_id"] = Auth::id();
            $suggestionUser = SuggestionUser::make($values);
            $suggestionUser->save();
            DB::commit();
            return $suggestionUser;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$suggestionUser)
    {
        /* dd($values); */
        $suggestionUser->update($values);
    }
}
