<?php

namespace App\Services;

use App\Contact;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

/* use App\Transaction; */
use Illuminate\Support\Facades\Notification;

class ContactService
{

    public static function all($perPage = 10 , $search)
    {
        /* dd($search); */
        if ($search){
            $faqs = Contact::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $faqs = Contact::orderBy('updated_at', 'desc')->paginate($perPage);
        }
        return $faqs;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
        /*  $values['status'] = "enabled"; */
            $faq = Contact::make($values);
            $faq->save();
            DB::commit();
            return $faq;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function update(&$values, &$contact)
    {
        $contact->update($values);
    }
}
