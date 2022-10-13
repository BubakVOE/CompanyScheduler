<?php

namespace App\Http\Controllers\Employee;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Project;
use App\Models\WorkTime;


use App\Http\Requests\CreateWorkRequest;
use App\Http\Requests\UpdateWorkRequest;

use App\Http\Controllers\Controller;

class WorkTimeController extends Controller
{

    public function update(UpdateWorkRequest $request)
    {
        $work = WorkTime::findOrFail($request->id);

        $work->update([
            'hours' => $request->input('hours'),
            'project_name' => $request->input('project_name'),
            'money_per_hour' => $request->input('money_per_hour'),
            'job' => $request->input('job'),
            'date' => $request->input('date'),
        ]);

        return ['success' => true];
    }

    public function delete($id, Request $request)
    {
        $work = WorkTime::findOrFail($id);

        $work->delete();

        return ['success' => true];
    }

    public function store(CreateWorkRequest $request)
    {
        $project_id = Project::whereName($request->input('project'))->value('id');

        $work = WorkTime::create([
            'user_id' => $request->input('user_id'),
            'project_id' => $project_id,

            'employee' => $request->input('employee'),
            'hours' => $request->input('hours'),
            'money_per_hour' => $request->input('money_per_hour'),
            'project_name' => $request->input('project'),
            'job' => $request->input('job'),
            'date' => $request->input('date'),
        ]);

        return [
            'success' => true,
            'message' => 'Úspešně jsi přidal dataasd'
        ];

        // $workData = WorkTime::where('date', $request->input('date'))
        //     ->where('user_id', $request->input('user_id'));

        // if ($workData->get()->isEmpty()) {
        //     $employee = WorkTime::create([
        //         'user_id' => $request->input('user_id'),
        //         'project_id' => $project_id,

        //         'employee' => $request->input('employee'),
        //         'hours' => $request->input('hours'),
        //         'money_per_hour' => $request->input('money_per_hour'),
        //         'project_name' => $request->input('place'),
        //         'job' => $request->input('job'),
        //         'date' => $request->input('date'),
        //     ]);

        //     return ['success' => true, 'message' => 'Úspešně jsi přidal data aaa'];
        // } else {
        //     if ($request->input('confirmed') == 0) {
        //         return ['success' => false, 'message' => 'PRACE PRO TENTO DEN JE JIZ ZADANA'];
        //     } else {
        //         $workData->delete();

        //         $employee = WorkTime::create([
        //             'user_id' => $request->input('user_id'),
        //             'project_id' => $project_id,

        //             'employee' => $request->input('employee'),
        //             'hours' => $request->input('hours'),
        //             'money_per_hour' => $request->input('money_per_hour'),
        //             'project_name' => $request->input('place'),
        //             'job' => $request->input('job'),
        //             'date' => $request->input('date'),
        //         ]);

        //         return ['success' => true, 'message' => 'Úspešně jsi přidal data'];
        //     }
        // }
    }

    // from EMPLOYEE
    public function generatePDF($id, $year, $month)
    {
        $user = User::findOrFail($id);

        $works = $user->work_times->sortByDesc('date');

        $start_date = Carbon::make($year . '-' . $month)
            ->subDay()
            ->firstOfMonth();

        $end_date = Carbon::make($year . '-' . $month)->lastOfMonth();

        $works_for_month = $works->where('date', '>=', $start_date)->where('date', '<=', $end_date);

        $last_month_earns = 0;

        foreach ($works_for_month as $month_works) {
            $last_month_earns = $last_month_earns + $month_works->hours * $month_works->money_per_hour;
        }

        $data = [
            'works_for_month' => $works_for_month,
            'user' => $user,
            'month' => $month,
            'year' => $year,
            'last_month_earns' => $last_month_earns,
        ];

        $pdf = PDF::loadView('pages.employee.section.workerPDF', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('myPDF.pdf');
    }
}
