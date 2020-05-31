<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteSetting\SiteSettingResource;
use App\Http\Requests\SiteSetting\SiteSettingRequest;
use App\Services\SiteSettingService;
use App\SiteSetting;

class SiteSettingController extends Controller
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
        return SiteSettingResource::collection(SiteSettingService::all($perPage, $search));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(SiteSetting $site_setting)
    {
        //
        return new SiteSettingResource($site_setting);
    }
    public function update(SiteSettingRequest $request, SiteSetting $site_setting)
    {
        $validate = $request->validated();
        SiteSettingService::update($validate, $site_setting);
        return new SiteSettingResource($site_setting);
    }
}
