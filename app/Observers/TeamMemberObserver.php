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
        $TeamMember->notify(new CompleteTeamRegistration());
    }

    /**
     * Listen to the TeamMember deleting event.
     *
     * @param  \App\TeamMember  $TeamMember
     * @return void
     */
    public function saving(TeamMember $TeamMember)
    {
        $columns = $TeamMember->getDirty();
        foreach ($columns as $column => $newValue) {
            // if($column == 'email')
            //     $TeamMember->notify(new UpdateTeamRegistration());
        }
    }
}
