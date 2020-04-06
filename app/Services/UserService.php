<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;
/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class UserService
{
    public static function login($values)
    {
        
        if (Auth::attempt(['email' => $values['email'], 'password' => $values['password']])) {
            $user = Auth::user();
            //* verificacion del mail
        /*     if ($user->email_verified_at !== NULL) { */
                //*revisar si esta o no esta habilitado
                if ($user->status !== "disabled") {
                    $user->token = $user->createToken('inglu');
                 /*    $user->amount_debt = [
                        'transactions' => Transaction::where('user_id', $user->id )->whereIn('status_payment', ['PENDIENTE', 'FACTURADA'])->sum('amount'),
                        'charge' => ChargeCollection::where('status', 'pending')->where('user_id', $user->id)->sum('amount')
                    ]; */
                    return $user;
                } else {
                    abort(403, 'Account Disabled');
                }
           /*  } else {
                abort(401, 'Please Verify Email');
            } */
        } else {
            abort(403, 'Unauthorized');
        }
    }


    public static function all($perPage, $search, $sort)
    {
   /*      return User::whereHas(
            'roles',
            function ($query) {
                return $query->where('name', '!=', 'customer');
            }
        )->when(
            $sort,
            function ($q) use ($sort) {
                $arr = explode("|", $sort);
                return $q->orderBy($arr[0], $arr[1]);
            }
        )->when(
            $search,
            function ($q) use ($search) {
                return $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%");
            }
        )->orderBy('id', 'desc')->paginate($perPage); */
    }


    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
            $values['status'] = "enabled";
            $user = User::create($values);
            $user->email_verified_at = now();
            $user->save();
            $roles = Arr::get($values, "roles");
            $user->syncRoles($roles);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$user)
    {
        $user->update($values);
    }

    public static function change_password($value)
    {
        $user = Auth::user();
        $user->password = $value['new_password'];
        $user->save();
       /*  Notification::send($user, new ChangePasswordNotification(
            $user->id,
            $value['password']
        )); */
        return $user;
    }

}
