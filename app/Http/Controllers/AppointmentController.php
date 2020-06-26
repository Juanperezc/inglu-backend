<?php
namespace App\Http\Controllers;

use App\Appointment;

use App\Http\Requests\Appointment\AppointmentRequest;
use App\Http\Resources\Appointment\AppointmentResource;
use App\Http\Resources\Treatment\TreatmentResource;
use App\Notifications\NewAppointment;
use App\Services\AppointmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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

      //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_appointments(Request $request)
    {
        //
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return AppointmentResource::collection(AppointmentService::my_appointments($perPage, $search));
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

        //* notify
        
        //?patient
        $appointment_date = Carbon::parse($appointment->date)->timezone('America/Caracas')->format('d-m-Y g:i A');
        $doctor_name = $appointment->medical->name;
        $location = $appointment->workspace->location;
        Notification::send($appointment->patient, new NewAppointment($appointment_date, $doctor_name, $location));

        //?doctor?

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

    public function show_treatment(Appointment $appointment)
    {
        //
        if ($appointment->treatment) {
            return new TreatmentResource($appointment->treatment);
        } else {
            return response(['data' => null], 200);
        }

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
