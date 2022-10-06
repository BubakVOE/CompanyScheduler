<?php

namespace App\Observers;

use App\Models\WorkTime;

class WorkTimeObserver
{
    /**
     * Handle the WorkTime "created" event.
     *
     * @param  \App\Models\WorkTime  $workTime
     * @return void
     */
    public function created(WorkTime $workTime)
    {
        //
    }

    /**
     * Handle the WorkTime "updated" event.
     *
     * @param  \App\Models\WorkTime  $workTime
     * @return void
     */
    public function updated(WorkTime $workTime)
    {
        //
    }

    /**
     * Handle the WorkTime "deleted" event.
     *
     * @param  \App\Models\WorkTime  $workTime
     * @return void
     */
    public function deleted(WorkTime $workTime)
    {
        //
    }

    /**
     * Handle the WorkTime "restored" event.
     *
     * @param  \App\Models\WorkTime  $workTime
     * @return void
     */
    public function restored(WorkTime $workTime)
    {
        //
    }

    /**
     * Handle the WorkTime "force deleted" event.
     *
     * @param  \App\Models\WorkTime  $workTime
     * @return void
     */
    public function forceDeleted(WorkTime $workTime)
    {
        //
    }
}
