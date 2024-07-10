<?php

namespace App\Listeners;

use App\Events\EventStored;
use Ladumor\OneSignal\OneSignal;

class SendFCMNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventStored $event): void
    {
        $fields['included_segments'] = ['All'];
        $message = $event->message;

        OneSignal::sendPush($fields, $message);
    }
}
