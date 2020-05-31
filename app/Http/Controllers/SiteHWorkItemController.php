<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteHWork\SiteHWorkItemResource;
use App\Http\Requests\SiteHWork\SiteHWorkItemRequest;
use App\Services\SiteHWorkItemService;
use App\SiteHWorkItem;

class SiteHWorkItemController extends Controller
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
        return SiteHWorkItemResource::collection(SiteHWorkItemService::all($perPage, $search));
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
    public function store(SiteHWorkItemRequest $request)
    {
        $validate = $request->validated();
        $site_h_work_item = SiteHWorkItemService::store($validate);
        
        return new SiteHWorkItemResource($site_h_work_item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SiteHWorkItem $site_h_work_item)
    {
        //
        return new SiteHWorkItemResource($site_h_work_item);
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
    public function update(SiteHWorkItemRequest $request, SiteHWorkItem $site_h_work_item)
    {
        $validate = $request->validated();
        SiteHWorkItemService::update($validate, $site_h_work_item);
        return new SiteHWorkItemResource($site_h_work_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = SiteHWork::destroy($id);
        return response(['processed' => $processed], 204);
    }
}
