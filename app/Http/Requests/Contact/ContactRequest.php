<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
        return [
            'name' => ['required', 'max:255'],
            'last_name' => ['max:255'],
            'email' => ['required'],
            'id_card' => ['required'],
            'type' => ['nullable'],
            'gender' => ['nullable'],
            'message' => ['nullable'],
            'date_of_birth' => ['required'],
            'address' => ['nullable'],
            'phone' =>  ['nullable', 'max:255'],
            'status' =>  ['nullable', Rule::in([0,1,2,3])],
        ];
    }
}
