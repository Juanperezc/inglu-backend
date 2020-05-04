<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Resources\Appointment\AppointmentResource;
use App\Http\Requests\Appointment\AppointmentRequest;
use App\Services\AppointmentService;
use App\Appointment;

class AppointmentController extends Controller
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
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return AppointmentResource::collection(AppointmentService::all($perPage, $search));
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
    public function store(AppointmentRequest $request)
    {
        $validate = $request->validated();
        $appointment = AppointmentService::store($validate);
        
        return $appointment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
        return new AppointmentResource($appointment);
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
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $validate = $request->validated();
        AppointmentService::update($validate, $appointment);
        return new AppointmentResource($appointment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processed = Appointment::destroy($id);
        return response(['processed' => $processed], 204);
    }

}
