<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteInformation\SiteInformationResource;
use App\Http\Requests\SiteInformation\SiteInformationRequest;
use App\Services\SiteInformationService;
use App\SiteInformation;

class SiteInformationController extends Controller
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
        return SiteInformationResource::collection(SiteInformationService::all($perPage, $search));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(SiteInformation $site_information)
    {
        //
        return new SiteInformationResource($site_information);
    }
    public function update(SiteInformationRequest $request, SiteInformation $site_information)
    {
        $validate = $request->validated();
        SiteInformationService::update($validate, $site_information);
        return new SiteInformationResource($site_information);
    }
}
