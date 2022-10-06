<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\WorkRequest;
use App\Models\Project;
use App\Models\User;
use App\Models\WorkTime;
use Carbon\Carbon;
use Illuminate\Http\Request;

class processCreateWorkTimeController extends Controller
{
    // STORE
    public function store(WorkRequest $request)
    {
        $name = $request->input('place');

        $project_id = Project::whereName($name)->value('id');

        $workData = WorkTime::where('date', $request->input('date'))
            ->where('user_id', $request->input('user_id'));

        if ($workData->get()->isEmpty()) {
            $employee = WorkTime::create([
                'user_id' => $request->input('user_id'),
                'project_id' => $project_id,

                'employee' => $request->input('employee'),
                'hours' => $request->input('hours'),
                'money_per_hour' => $request->input('money_per_hour'),
                'project_name' => $request->input('place'),
                'job' => $request->input('job'),
                'date' => $request->input('date'),
            ]);

            return ['success' => true, 'message' => 'Úspešně jsi přidal data aaa'];
        } else {
            if ($request->input('confirmed') == 0) {
                return ['success' => false, 'message' => 'PRACE PRO TENTO DEN JE JIZ ZADANA'];
            } else {
                $workData->delete();

                $employee = WorkTime::create([
                    'user_id' => $request->input('user_id'),
                    'project_id' => $project_id,

                    'employee' => $request->input('employee'),
                    'hours' => $request->input('hours'),
                    'money_per_hour' => $request->input('money_per_hour'),
                    'project_name' => $request->input('place'),
                    'job' => $request->input('job'),
                    'date' => $request->input('date'),
                ]);

                return ['success' => true, 'message' => 'Úspešně jsi přidal data'];
            }
        }
    }

    // UPDATE
    public function update(Request $request)
    {
        try {
            $work = WorkTime::findOrFail($request->id);

            $work->update([
                'hours' => $request->input('hours'),
                'project_name' => $request->input('project_name'),
                'money_per_hour' => $request->input('money_per_hour'),
                'job' => $request->input('job'),
                'date' => $request->input('date'),
            ]);

            return ['success' => true];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    // DELETE
    public function delete($id, Request $request)
    {
        $work = WorkTime::findOrFail($id);

        $work->delete();

        return ['success' => true];
    }

    // GETWORKS
    /*
    public function getWorks($id, Request $request)
    {
        // podmínka, která bere data z URL->year
        if ($request->input('year') != null) {

            $year = $request->input('year');

        } else {

            $year = null;
        }

        // podmínka, která bere data z URL->month
        if ($request->input('month') != null) {

            $month = $request->input('month');

        } else {

            $month = null;
        }

        try {
            if ($year != null && $month != null){

                $start_date = Carbon::make($year . '-' . $month)->firstOfMonth();

                $end_date = Carbon::make($year . '-' . $month)->lastOfMonth();

                $works_for_month = WorkTime::where('user_id',$id)->whereDate('date', '>=', $start_date)->whereDate('date', '<=', $end_date)->get()->sortByDesc('date');

                return $works_for_month;
            }

        } catch (\Exception $e) {

            return ['success' => false, 'message' => $e->getMessage()];

        }

    }*/
}
