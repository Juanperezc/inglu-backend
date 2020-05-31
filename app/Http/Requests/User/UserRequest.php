<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $offer = $this->route('user');
      
        // edit rules
        if ($offer) {
            return $this->edit();
        }else{
            return $this->store();
        }
        // edit rules
      /*   dd($offer); */
        /* if ($offer) {
            return $this->edit();
        } */
   
    }

       /*
    * Get the validation rules that apply to the edit request.
    *
    * @return array
    *
    */
    public function edit()
    {
        $user = Auth::user();
        $offer = $this->route('user');

        if ($user->id == $offer->id){
        //  editar datos basicos
        return [
            'name' => ['required', 'max:255'],
            'last_name' => ['max:255'],
            'id_card' => ['required', 'unique:users,id_card,' . $offer->id . ',id'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'profile_pic' => ['nullable'],
            'address' => ['nullable'],
            'phone' =>  ['nullable', 'max:255'],
            'status' =>  ['nullable', Rule::in([0,1,2])],
        ];

        }else{
            // esta editando a alguien mas
            return [
                'name' => ['required', 'max:255'],
                'last_name' => ['max:255'],
                'id_card' => ['required', 'unique:users,id_card,' . $offer->id . ',id'],
                'gender' => ['required'],
                'date_of_birth' => ['required'],
                'profile_pic' => ['required'],
                'address' => ['nullable'],
                'phone' =>  ['nullable', 'max:255'],
                'status' =>  ['required', Rule::in([0,1,2])],
                'type' =>  ['nullable', Rule::in([1,2,3])],
            ];
        }
    }
    public function store()
    {
        return [
            'name' => ['required', 'max:255'],
            'last_name' => ['max:255'],
            'id_card' => ['required', 'unique:users,id_card'],
            'email' => ['required', 'unique:users,email'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'profile_pic' => ['required'],
            'address' => ['nullable'],
            'phone' =>  ['nullable', 'max:255'],
            'type' =>  ['required', Rule::in([1,2,3])],
        ];
    }
}
