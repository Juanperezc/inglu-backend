<?php

namespace App\Observers;

use App\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Jobs\TerminateEvent;
class EventObserver
{
    /**
     * Handle the event "created" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        $now = Carbon::now();
        $emitted = Carbon::parse($event->date);
        $diffInSeconds = $now->diffInSeconds($emitted,false);
        $diff = $now->diff($emitted);
        if ($diffInSeconds > 0){
     /*    (new TerminateEvent($event->id))->delay($diff); */
        (new TerminateEvent($event->id))->delay($diff);
        //! notificacion recordatorio
     /*    TerminateEvent::dispatch($event->id) */;
        }else{
        TerminateEvent::dispatch($event->id);
        }
        Log::info("event diffInSeconds : " .  $diffInSeconds);
      /*   Log::info("event diff : " .  var_dump($diff)); */
    }

    /**
     * Handle the event "updated" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function updated(Event $event)
    {
        //
      /*   Log::info("event"); */
    }

    /**
     * Handle the event "deleted" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        //
    }

    /**
     * Handle the event "restored" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the event "force deleted" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
