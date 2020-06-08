<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteTeam\SiteTeamResource;
use App\Http\Resources\SiteTeam\SiteTeamMemberResource;
use App\Http\Requests\SiteTeam\SiteTeamRequest;
use App\Services\SiteTeamService;
use App\SiteTeam;


class SiteTeamController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return SiteTeamResource::collection(SiteTeamService::all($perPage, $search));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(SiteTeam $site_team)
    {
        //
        return new SiteTeamResource($site_team);
    }
    public function update(SiteTeamRequest $request, SiteTeam $site_team)
    {
        $validate = $request->validated();
        SiteTeamService::update($validate, $site_team);
        return new SiteTeamResource($site_team);
    }
}
