<?php

namespace App\Listeners;

use App\Events\NotismsCreated;
use App\Notifications\MensajeSent;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifySmsCreated implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotismsCreated  $event
     * @return void
     */
    public function handle(NotismsCreated $event)
    {
        // Access the post using $event->post...
        $recipient = User::find($event->mensaje->recipient_id);

        $recipient->notify(new MensajeSent($event->mensaje));
        //Notification::send($users, new MensajeSent($event->mensaje));
    }
}
