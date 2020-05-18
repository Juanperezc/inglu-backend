<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Event\EventUserResource;
use App\Http\Requests\Event\EventUserRequest;
use App\Services\EventUserService;
use App\EventUser;


class EventUserController extends Controller
{
    //
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
        return EventUserResource::collection(EventUserService::all($perPage, $search));
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
    public function store(EventUserRequest $request)
    {
        $validate = $request->validated();
        $event_user = EventUserService::store($validate);
        return new EventUserResource($event_user);
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EventUser $event_user)
    {
        return new EventUserResource($event_user);
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
    public function update(EventUserRequest $request, EventUser $event_user)
    {
        $validate = $request->validated();
        EventUserService::update($validate, $event_user);
        return new EventUserResource($event_user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = EventUser::destroy($id);
        return response(['processed' => $processed], 204);
    }
}
