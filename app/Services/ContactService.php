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
            $contacts = Contact::search($search)->orderBy('updated_at', 'desc')->paginate($perPage);
        }else{
            $contacts = Contact::orderBy('updated_at', 'desc')->paginate($perPage);
        }
        return $contacts;
    }

    public static function store(&$values)
    {
        try {
            DB::beginTransaction();
            $contact = Contact::make($values);
            $contact->save();
            DB::commit();
            return $contact;
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
