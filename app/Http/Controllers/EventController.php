<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\Event\EventRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Event\EventResource;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //\
        $type = $request->input('type', null);
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return EventResource::collection(EventService::all($perPage, $search, $type));
    }

    public function my_events(Request $request)
    {
        //
        $type = $request->input('type', null);
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return EventResource::collection(EventService::my_events($perPage, $search, $type));
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
    public function store(EventRequest $request)
    {
        $validate = $request->validated();
        $event = EventService::store($validate);
        return new EventResource($event);
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $user = Auth::user();
        return (new EventResource($event))->user($user);
     
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
    public function update(EventRequest $request, Event $event)
    {
        $validate = $request->validated();
        EventService::update($validate, $event);
        return new EventResource($event);
    }


    public function join(Event $event)
    {
        EventService::join($event);
        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = Event::destroy($id);
        return response(['processed' => $processed], 204);
    }
}
