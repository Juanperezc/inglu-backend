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
use Illuminate\Support\Facades\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;

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

    public function appointment_by_user(Request $request,$id)
    {
        //
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $all = $request->input('all', false);
        return AppointmentResource::collection(AppointmentService::appointment_by_user($perPage, $id));
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
        $appointmentFind = Appointment::where('user_workspace_id', $validate["user_workspace_id"])->get();
        $error_dates = 0;
        foreach ($appointmentFind as $a) {
            $date1 = Carbon::parse($a->date)->timestamp;
            $date2 = Carbon::parse($a->date)->addHours(1)->timestamp;
            $parseDate = Carbon::parse($validate["date"])->timestamp;
            $condition1 = $parseDate >= ($date1);
            $condition2 = $parseDate <= ($date2);
            /*     return "date1: " . $date1 . " date2: " . $date2 ." dateparse: " . $parseDate; */
            /*        return "condition1: " . $condition1 . " condition2: " . $condition2;
             */
            /*   Log::info("condition1:" . $condition1);
            Log::info("condition2:" . $condition2); */
            /*   Log::info("condition3:" . $condition1 && $condition2);
             */
            if ($condition1
                && $condition2
            ) {
                $error_dates++;
            }

        }
        if ($error_dates == 0) {
            $appointment = AppointmentService::store($validate);

            //?patient
            $appointment_date = Carbon::parse($appointment->date)->timezone('America/Caracas')->format('d-m-Y g:i A');
            $doctor_name = $appointment->medical->name;
            $patient_name = $appointment->patient->name;
            $location = $appointment->workspace->location;
            //* notify
            Notification::send($appointment->patient, new NewAppointment($appointment_date, $doctor_name, $location));
            //?doctor?
            Notification::send($appointment->medical, new NewAppointment($appointment_date, $patient_name, $location, ['database'/* , OneSignalChannel::class */]));

            return $appointment;
        } else {
            abort(430, 'Date does not match');
        }

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $validate = $request->validated();
        $appointmentFind = Appointment::where('user_workspace_id', $validate["user_workspace_id"])->get();
        $error_dates = 0;
        foreach ($appointmentFind as $a) {
            $date1 = Carbon::parse($a->date)->timestamp;
            $date2 = Carbon::parse($a->date)->addHours(1)->timestamp;
            $parseDate = Carbon::parse($validate["date"])->timestamp;
            $condition1 = $parseDate >= ($date1);
            $condition2 = $parseDate <= ($date2);
            if ($condition1
                && $condition2
            ) {
                $error_dates++;
            }
        }
        if ($error_dates == 0) {
            AppointmentService::update($validate, $appointment);
            return new AppointmentResource($appointment);
        }
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
