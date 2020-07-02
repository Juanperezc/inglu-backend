<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Appointment;
class TerminateAppointment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $appointment_id;
    public function __construct($appointment_id)
    {
        $this->appointment_id = $appointment_id;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $appointment = Appointment::find($this->appointment_id);
        if ($appointment){
            $appointment->status = 3;
            $appointment->save();
            //Enviar notificacion??
        }
    }
}
