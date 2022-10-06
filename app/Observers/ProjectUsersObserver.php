<?php

namespace App\Observers;

use App\Models\ProjectUsers;

class ProjectUsersObserver
{
    /**
     * Handle the ProjectUsers "created" event.
     *
     * @param  \App\Models\ProjectUsers  $projectUsers
     * @return void
     */
    public function created(ProjectUsers $projectUsers)
    {
        //
    }

    /**
     * Handle the ProjectUsers "updated" event.
     *
     * @param  \App\Models\ProjectUsers  $projectUsers
     * @return void
     */
    public function updated(ProjectUsers $projectUsers)
    {
        //
    }

    /**
     * Handle the ProjectUsers "deleted" event.
     *
     * @param  \App\Models\ProjectUsers  $projectUsers
     * @return void
     */
    public function deleted(ProjectUsers $projectUsers)
    {
        //
    }

    /**
     * Handle the ProjectUsers "restored" event.
     *
     * @param  \App\Models\ProjectUsers  $projectUsers
     * @return void
     */
    public function restored(ProjectUsers $projectUsers)
    {
        //
    }

    /**
     * Handle the ProjectUsers "force deleted" event.
     *
     * @param  \App\Models\ProjectUsers  $projectUsers
     * @return void
     */
    public function forceDeleted(ProjectUsers $projectUsers)
    {
        //
    }
}
