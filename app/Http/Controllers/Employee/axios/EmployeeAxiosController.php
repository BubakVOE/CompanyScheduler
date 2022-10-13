<?php

namespace App\Http\Controllers\Employee\axios;

use Carbon\Carbon;
use App\Models\User;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravolt\Avatar\Avatar;


class EmployeeAxiosController extends Controller
{
    // EmployeeInfo EmployeeInfo EmployeeInfo EmployeeInfo EmployeeInfo EmployeeInfo EmployeeInfo EmployeeInfo EmployeeInfo EmployeeInfo
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

        if ($year != null && $month != null) {
            $start_date = Carbon::make($year . '-' . $month)->firstOfMonth();

            $end_date = Carbon::make($year . '-' . $month)->lastOfMonth();

            $works_for_month = WorkTime::where('user_id', $id)
                ->whereDate('date', '>=', $start_date)
                ->whereDate('date', '<=', $end_date)
                ->get()
                ->sortByDesc('date');


            $count_works = count($works_for_month);

            $obj_hours = $works_for_month->pluck('hours');

            $count_hours = 0;

            foreach ($obj_hours as $hours) {
                $count_hours = $count_hours + $hours;
            }

            return [
                'works_for_month' => $works_for_month,
                'count_works' => $count_works,
                'count_hours' => $count_hours,
            ];
        } else {
            $works_for_month = 0;

            return $works_for_month;
        }
    }

    public function getEmployee($id)
    {
        $user = User::findOrFail($id);

        $avatar = new Avatar(config('laravolt.avatar'));

        $user->avatar = $avatar->create("$user->first_name $user->last_name")->toBase64();

        return [
            'user' => $user
        ];
    }


    public function getYears($id){
        
    }


    public function dataByYear(Request $request, $id)
    {
        
        $year = $request->year;

        $user = User::findOrFail($id);


        $last_year_start = Carbon::now()
            ->startOfYear()
            ->format($year.'-m-d');
            //->format($year.'-d-m');


        $last_year_end = Carbon::now()
            ->endOfYear()
            ->format($year.'-m-d');


        $graph_data = [
            'labels' => [],
            'datasets' => [],
        ];

        $graph_data['labels'] = ['Leden', 'Únor', 'Březen', 'Duben', 'Květen', 'Červen', 'Červenec', 'Srpen', 'Září', 'Říjen', 'Listopad', 'Prosinec'];

        //DATASETS
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $work_times = WorkTime::whereIn('user_id', [$user->id])
            ->where('date', '>=', $last_year_start)
            ->where('date', '<=', $last_year_end)
            ->get();

        foreach ($work_times as $work) {
            $key = (Carbon::make($work->date)->format('m') * 10) / 10;

            $data[$key] += $work->money_per_hour*$work->hours;
        }

        $dataset = [
            'label' => $user->first_name . ' ' . $user->last_name,
            'backgroundColor' => $user->user_color,
            //'borderColor' => $user->user_color,
            //'borderWidth' => 1.5,
            'data' => $data,
        ];

        $graph_data['datasets'][] = $dataset;

        return $graph_data;
    }
}
