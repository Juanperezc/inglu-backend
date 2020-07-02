<?php

namespace App\Services;

use App\User;
use App\Specialty;
use App\UserWorkspace;
use App\UserWorkspaceTime;
use App\MedicalRecord;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/* use App\Transaction; */

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

    public static function recover_password($values)
    {
        $user = User::where('email', $values["email"])->first();
        \Log::info('email' . $values["email"]);
        $hash = Str::random(6);
        \Log::info('hash' . $hash);
        $user->password = $hash;
        $user->save();
        if ($user){
            return ["user" => $user, "password" => $hash ];
        }else{
            return null;
        }
    }

    public static function all_patient($perPage = 10, $search)
    {
        /* dd($search); */

        if ($search) {
            $matching = User::search($search)->orderBy('updated_at', 'desc')->get()->pluck('id');
            $user = User::whereIn('id', $matching)->whereIn('type', [1, 3])->orderBy('updated_at', 'desc')->paginate($perPage);

        } else {
            $user = User::whereIn('type', [1, 3])->orderBy('updated_at', 'desc')->paginate($perPage);
        }

        return $user;
    }

    public static function all_doctors($perPage = 10, $search)
    {

        if ($search) {
            $matching = User::search($search)->orderBy('updated_at', 'desc')->get()->pluck('id');
            $user = User::whereIn('id', $matching)->whereIn('type', [2])->orderBy('updated_at', 'desc')->paginate($perPage);
        } else {
            $user = User::where('type', 2)->orderBy('updated_at', 'desc')->paginate($perPage);
        }

        return $user;
    }

    public static function all_doctors_by_specialty($specialty_id)
    {
            $specialty = Specialty::find($specialty_id);
            if ($specialty){
                return $specialty->users;
            }else{
                return null;
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

/*     public static function store(&$values)
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
} */

    public static function update(&$values, &$user)
    {
        $user->update($values);
    }

    public static function update_medical_record(&$values, &$user)
    {
        $user->medical_record()->update($values);
    }

    public static function change_password(&$value, &$user)
    {
        /* $user = Auth::user(); */
        $user->password = $value['new_password'];
        $user->save();
        /*  Notification::send($user, new ChangePasswordNotification(
        $user->id,
        $value['password']
        )); */
        return $user;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
            /*  $values['status'] = "enabled"; */
            $user = User::make($values);
            $user->email_verified_at = now();
            $user->save();
            /*  $user->email_verified_at = now(); */
            if ($values["type"] == 2) {
                $user->roles()->attach([2]);
            } else if ($values["type"] == 1) {
                $user->roles()->attach([4]);

                $user->medical_record()->save(new MedicalRecord);
            }

            /* $roles = Arr::get($values, "roles");
            $user->syncRoles($roles); */

            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public static function store_specialty(&$value, &$user)
    {
        /* $user = Auth::user(); */
        $user->specialties()->attach($value['specialty']);
        $user->save();
        return $user;
    }

    public static function store_workspace(&$value, &$user)
    {
        /* $user = Auth::user(); */
        $user->workspaces()->attach($value['specialty'],['location' => $value['location']]);
        $user->save();
        $user_workspace = UserWorkspace::where([
        'user_id' => $user->id,
        'specialty_id' => $value['specialty']])->
        orderBy('id', 'desc')->first();
        
       $time = UserWorkspaceTime::create([
        'start_time' => $value['start_time'],
        'end_time' => $value['end_time'],
        'day' => $value['day'],
        'user_workspace_id' => $user_workspace->id
        ]);
     
        return $user_workspace;
    }
   
}
