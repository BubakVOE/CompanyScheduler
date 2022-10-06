<?php

namespace App\Connector\Dashboard;

use App\Models\WorkTime;

class deleteConnector
{
    public function delete($id)
    {
        $work = WorkTime::findOrFail($id);

        $work->delete();

        return back()->with('message', 'Smazal jsi data');
    }
}
