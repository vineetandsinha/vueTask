<?php

namespace App\Listeners;

use App\Events\TaskDeadlineApproaching;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyDeadlineApproaching
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
     * @param  \App\Events\TaskDeadlineApproaching  $event
     * @return void
     */
    public function handle(TaskDeadlineApproaching $event)
    {
        //
    }
}
