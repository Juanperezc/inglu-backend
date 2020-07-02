<?php

namespace App\Observers;

use App\Appointment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Jobs\TerminateAppointment;
class AppointmentObserver
{
    /**
     * Handle the appointment "created" appointment.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function created(Appointment $appointment)
    {
        $now = Carbon::now();
        $emitted = Carbon::parse($appointment->date);
        $diffInSeconds = $now->diffInSeconds($emitted,false);
        $diff = $now->diff($emitted);
        if ($diffInSeconds > 0){
     /*    (new TerminateAppointment($appointment->id))->delay($diff); */
        (new TerminateAppointment($appointment->id))->delay($diff);
        //! notificacion recordatorio
     /*    TerminateAppointment::dispatch($appointment->id) */;
        }else{
        TerminateAppointment::dispatch($appointment->id);
        }
        Log::info("appointment diffInSeconds : " .  $diffInSeconds);
      /*   Log::info("appointment diff : " .  var_dump($diff)); */
    }

    /**
     * Handle the appointment "updated" appointment.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function updated(Appointment $appointment)
    {
        //
      /*   Log::info("appointment"); */
    }

    /**
     * Handle the appointment "deleted" appointment.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function deleted(Appointment $appointment)
    {
        //
    }

    /**
     * Handle the appointment "restored" appointment.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function restored(Appointment $appointment)
    {
        //
    }

    /**
     * Handle the appointment "force deleted" appointment.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function forceDeleted(Appointment $appointment)
    {
        //
    }
}
