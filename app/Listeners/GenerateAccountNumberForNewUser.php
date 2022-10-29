<?php

namespace App\Listeners;

use App\Models\Aza;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateAccountNumberForNewUser
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
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {

        // generate the random account nubmer

        //  first two digits of aza num is fixed as '01'
         $first_two_digits = '01';

         // this code generates random nos of length 8
         $last_eight_digits = rand(11111110, 99999999);
 
         // merge both the first and last parts together to form a 10 digit account number
         $new_aza_num = $first_two_digits . $last_eight_digits;

        //  save new aza num for the newly created user to the db
        $event->user->azas()->create(['num' => $new_aza_num]);

        // other account data like fname, lname, etc. will be later filled from the profile update forms online

    }
}
