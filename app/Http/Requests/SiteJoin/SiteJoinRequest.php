<?php

namespace App\Http\Requests\SiteJoin;

use Illuminate\Foundation\Http\FormRequest;

class SiteJoinRequest extends FormRequest
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
            'img'  => ['required'],
        ];
    }
}
