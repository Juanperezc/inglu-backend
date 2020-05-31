<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteTeam\SiteTeamMemberResource;
use App\Http\Requests\SiteTeam\SiteTeamMemberRequest;
use App\Services\SiteTeamMemberService;
use App\SiteTeamMember;

class SiteTeamMemberController extends Controller
{
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
        return SiteTeamMemberResource::collection(SiteTeamMemberService::all($perPage, $search));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteTeamMemberRequest $request)
    {
        $validate = $request->validated();
        $SiteTeamMember = SiteTeamMemberService::store($validate);
        
        return new SiteTeamMemberResource($SiteTeamMember);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SiteTeamMember $SiteTeamMember)
    {
        //
        return new SiteTeamMemberResource($SiteTeamMember);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteTeamMemberRequest $request, SiteTeamMember $SiteTeamMember)
    {
        $validate = $request->validated();
        SiteTeamMemberService::update($validate, $SiteTeamMember);
        return new SiteTeamMemberResource($SiteTeamMember);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = SiteTeamMember::destroy($id);
        return response(['processed' => $processed], 204);
    }

   
}
