<?php

namespace App\Http\Requests\SiteTeam;

use Illuminate\Foundation\Http\FormRequest;

class SiteTeamMemberRequest extends FormRequest
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
            'name' => ['required'],
            'role' => ['required'],
            'site_team_id' => ['required'],
        ];
    }
}
