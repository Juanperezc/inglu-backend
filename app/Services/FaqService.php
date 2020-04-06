<?php

namespace App\Services;

use App\Faq;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class FaqService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
        if ($search){
            $faqs = Faq::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $faqs = Faq::orderBy('updated_at', 'desc')->paginate($perPage);
        }
        return $faqs;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
        /*  $values['status'] = "enabled"; */
            $faq = Faq::make($values);
            $faq->save();
            DB::commit();
            return $faq;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$faq)
    {
        $faq->update($values);
    }
}
