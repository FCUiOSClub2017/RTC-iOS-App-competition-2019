<?php

namespace App\Observers;

use App\TeamMember;
use App\Notifications\CompleteTeamRegistration;
use App\Notifications\UpdateTeamRegistration;

class TeamMemberObserver
{
    /**
     * Listen to the TeamMember created event.
     *
     * @param  \App\TeamMember  $TeamMember
     * @return void
     */
    public function created(TeamMember $TeamMember)
    {
        if(auth()->check())
            if(auth()->user()->email != $TeamMember->email)
                $TeamMember->notify(new CompleteTeamRegistration());
    }

    /**
     * Listen to the TeamMember deleting event.
     *
     * @param  \App\TeamMember  $TeamMember
     * @return void
     */
    public function updating(TeamMember $TeamMember)
    {
        if($TeamMember->getOriginal('email') != $TeamMember->email){
            $TeamMember->notify(new UpdateTeamRegistration($TeamMember->getOriginal('email'),$TeamMember->email));
        }
        // foreach ($columns as $column => $newValue) {
        //     if($column == 'email')
        //         break;
        // }
    }
}
