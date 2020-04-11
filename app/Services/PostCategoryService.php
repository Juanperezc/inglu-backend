<?php

namespace App\Services;

use App\PostCategory;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

use Illuminate\Support\Facades\Notification;

class PostCategoryService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
        if ($search){
            $postCategorys = PostCategory::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $postCategorys = PostCategory::orderBy('updated_at', 'desc')->paginate($perPage);
        }
        return $postCategorys;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
        /*  $values['status'] = "enabled"; */
            $postCategory = PostCategory::make($values);
            $postCategory->save();
            DB::commit();
            return $postCategory;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$postCategory)
    {
        /* dd($values); */
        $postCategory->update($values);
    }
}
