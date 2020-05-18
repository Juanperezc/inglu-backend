<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => ['required'],
            'picture' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'limit' => ['required'],
            'type' => ['required'],
            'doctor_id' => ['required'],
            'location' => ['required'],
            'status' => ['required'],
            
        ];
    }
}
