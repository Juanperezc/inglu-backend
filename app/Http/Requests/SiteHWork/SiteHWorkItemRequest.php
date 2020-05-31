<?php

namespace App\Http\Requests\SiteHWork;

use Illuminate\Foundation\Http\FormRequest;

class SiteHWorkItemRequest extends FormRequest
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
            'img' => ['required'],
            'description' => ['required'],
            'site_h_work_id' => ['required'],
        ];
    }
}
