<?php

namespace App\Listeners;

use App\Events\TaskCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyTaskCompleted
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
     * @param  \App\Events\TaskCompleted  $event
     * @return void
     */
    public function handle(TaskCompleted $event)
    {
        //
    }
}
