<?php

namespace App\Listeners;

use App\Models\Profile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateProfileForNewUser
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
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // create a new empty profile using for this user
        /**
         * We will just create an empty profile for this user
         * later he will fill out the rest from his profile page
         * 
         */
        $event->user->profile()->create();
    }
}
