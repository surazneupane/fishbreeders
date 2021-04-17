<?php

namespace App\Listeners;

use App\Events\CheckChatRooms;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChatRoomNotification
{
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
     * @param  CheckChatRooms  $event
     * @return void
     */
    public function handle(CheckChatRooms $event)
    {
        //
    }
}
