<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteImage\SiteImageItemResource;
use App\Http\Requests\SiteImage\SiteImageItemRequest;
use App\Services\SiteImageItemService;
use App\SiteImageItem;

class SiteImageItemController extends Controller
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
        return SiteImageItemResource::collection(SiteImageItemService::all($perPage, $search));
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
    public function store(SiteImageItemRequest $request)
    {
        $validate = $request->validated();
        $site_image_item = SiteImageItemService::store($validate);
        
        return new SiteImageItemResource($site_image_item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SiteImageItem $site_image_item)
    {
        //
        return new SiteImageItemResource($site_image_item);
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
    public function update(SiteImageItemRequest $request, SiteImageItem $site_image_item)
    {
        $validate = $request->validated();
        SiteImageItemService::update($validate, $site_image_item);
        return new SiteImageItemResource($site_image_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = SiteImageItem::destroy($id);
        return response(['processed' => $processed], 204);
    }
}
