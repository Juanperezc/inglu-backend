<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteImage\SiteImageResource;
use App\Http\Resources\SiteImage\SiteImageItemResource;
use App\Http\Requests\SiteImage\SiteImageRequest;
use App\Services\SiteImageService;
use App\SiteImage;

class SiteImageController extends Controller
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
        return SiteImageResource::collection(SiteImageService::all($perPage, $search));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(SiteImage $site_image)
    {
        //
        return new SiteImageResource($site_image);
    }
    public function update(SiteImageRequest $request, SiteImage $site_image)
    {
        $validate = $request->validated();
        SiteImageService::update($validate, $site_image);
        return new SiteImageResource($site_image);
    }
}
