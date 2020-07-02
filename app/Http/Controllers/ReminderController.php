<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Reminder\ReminderResource;
use App\Http\Requests\Reminder\ReminderRequest;
use App\Services\ReminderService;
use App\Notifications\NewReminder;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Reminder;

class ReminderController extends Controller
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
        return ReminderResource::collection(ReminderService::all($perPage, $search));
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_reminders(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return ReminderResource::collection(ReminderService::my_reminders($perPage, $search));
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
    public function store(ReminderRequest $request)
    {
        $validate = $request->validated();
        $reminder = ReminderService::store($validate);
        //* notificacion

        $now = Carbon::now();
        $date = Carbon::parse($reminder->date);
        $reminder_id = $reminder->id;
        $diffInSeconds = $now->diffInSeconds($date,false);
        Notification::send(Auth::user(), 
        (new NewReminder($reminder_id))->delay($diffInSeconds));
        return new ReminderResource($reminder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
        return new ReminderResource($reminder);
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
    public function update(ReminderRequest $request, Reminder $reminder)
    {
        $validate = $request->validated();
        ReminderService::update($validate, $reminder);
        return new ReminderResource($reminder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = Reminder::destroy($id);
        return response(['processed' => $processed], 204);
    }

}
