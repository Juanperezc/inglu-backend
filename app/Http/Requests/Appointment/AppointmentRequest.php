<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'date' => ['required'],
            'condition' => ['required'],
            'patient_id' => ['nullable'],
            'medical_staff_id' => ['required'],
            'user_workspace_id' => ['nullable'],
            'contact_id' => ['nullable'],
            'qualification' => ['nullable'],
            'comment' => ['nullable'],
        ];
    }
}
