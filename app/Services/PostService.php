<?php

namespace App\Services;

use App\Post;
use App\PostCategory;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/* use App\Transaction; */

class PostService
{

    public static function all($perPage = 10, $search, $category = null)
    {
        if ($search) {
            $posts = Post::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        } else {
            if ($category) {
                $posts = Post::where('category_id', $category)->orderBy('updated_at', 'desc')->paginate($perPage);
            } else {
                $posts = Post::orderBy('updated_at', 'desc')->paginate($perPage);
            }
        }

        return $posts;
    }
    public static function all_categories()
    {
        $post_categories = PostCategory::all();
        return $post_categories;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
            /*  $values['status'] = "enabled"; */
            $post = Post::make($values);
            /*  $user->email_verified_at = now(); */
            $post->user()->associate(Auth::id());
            /* $roles = Arr::get($values, "roles");
            $user->syncRoles($roles); */
            $post->save();
            DB::commit();
            return $post;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$post)
    {
        $post->update($values);
    }
}
