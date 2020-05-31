<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteJoin\SiteJoinResource;
use App\Http\Requests\SiteJoin\SiteJoinRequest;
use App\Services\SiteJoinService;
use App\SiteJoin;

class SiteJoinController extends Controller
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
        return SiteJoinResource::collection(SiteJoinService::all($perPage, $search));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(SiteJoin $site_join)
    {
        return new SiteJoinResource($site_join);
    }

    public function update(SiteJoinRequest $request, SiteJoin $site_join)
    {
        $validate = $request->validated();
        SiteJoinService::update($validate, $site_join);
        return new SiteJoinResource($site_join);
    }
}
