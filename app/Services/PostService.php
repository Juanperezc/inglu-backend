<?php

namespace App\Services;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class PostService
{

    public static function all($perPage = 10 , $search)
    {
        $posts = Post::search($search)->paginate($perPage);
        /* $posts->category()->searchable(); */
        return $posts;
    }


    public static function store(&$values)
    {
      /*   try {
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
        } */
    }

    public static function update(&$values, &$price)
    {
        $price->update($values);
    }
}
