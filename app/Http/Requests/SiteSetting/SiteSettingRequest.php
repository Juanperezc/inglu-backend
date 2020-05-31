<?php

namespace App\Http\Requests\SiteSetting;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
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
            'title'  => ['required'], 
            'subtitle'  => ['required'],
            'playstore_url'  => ['required'],
            'linkedin_url'  => ['required'],
            'facebook_url'  => ['required'],
            'twitter_url'  => ['required']
        ];
    }
}
