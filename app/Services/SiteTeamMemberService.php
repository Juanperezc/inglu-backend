<?php

namespace App\Services;


use App\SiteTeamMember;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Notification;

class SiteTeamMemberService
{

    public static function all($perPage = 10 , $search)
    {
            $site_team_members = SiteTeamMember::orderBy('updated_at', 'desc')->paginate($perPage);
        /* $site_team_members->category()->searchable(); */
        return $site_team_members;
    }
  
    public static function store(&$values)
    {
          try {
            DB::beginTransaction();
            $site_team_member = SiteTeamMember::make($values);
            $site_team_member->save();
            DB::commit();
            return $site_team_member;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        } 
    }

    public static function update(&$values, &$site_team_member)
    {
        $site_team_member->update($values);
    }
}
