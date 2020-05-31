<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteHWork\SiteHWorkResource;
use App\Http\Requests\SiteHWork\SiteHWorkRequest;
use App\Services\SiteHWorkService;
use App\SiteHWork;

class SiteHWorkController extends Controller
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
        return SiteHWorkResource::collection(SiteHWorkService::all($perPage, $search));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(SiteHWork $site_h_work)
    {
        //
        return new SiteHWorkResource($site_h_work);
    }
    public function update(SiteHWorkRequest $request, SiteHWork $site_h_work)
    {
        $validate = $request->validated();
        SiteHWorkService::update($validate, $site_h_work);
        return new SiteHWorkResource($site_h_work);
    }
}
