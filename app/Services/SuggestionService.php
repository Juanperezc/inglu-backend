<?php

namespace App\Services;

use App\Suggestion;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class SuggestionService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
        if ($search){
            $faqs = Suggestion::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $faqs = Suggestion::orderBy('updated_at', 'desc')->paginate($perPage);
        }
        return $faqs;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
        /*  $values['status'] = "enabled"; */
            $faq = Suggestion::make($values);
            $faq->save();
            DB::commit();
            return $faq;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$suggestion)
    {
        $suggestion->update($values);
    }
}
