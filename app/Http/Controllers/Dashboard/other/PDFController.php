<?php

namespace App\Http\Controllers\Dashboard\other;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use Carbon\CarbonPeriod;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{

    public function index()
    {
        $companies = Company::all();

        $years = [2021, 2022];

        $months = [];

        for ($month = 1; $month <= 12; $month++) {
            $months[$month] = Carbon::create()
                ->month($month)
                ->format('m');
        }

        $users = User::all();

        return view('pages.dashboard.other.pdf', [
            'companies' => $companies,
            'years' => json_encode($years),
            'months' => json_encode($months),
            'users' => $users,
        ]);
    }



    public function employeePDF($user_id, $year, $month)
    {
        $user = User::findOrFail($user_id);

        $works = $user->work_times->sortByDesc('date');

        $start_date = Carbon::make($year . '-' . $month)
            ->firstOfMonth()
            ->toDateString();

        $end_date = Carbon::make($year . '-' . $month)
            ->lastOfMonth()
            ->toDateString();

        $works_for_month = $works->where('date', '>=', $start_date)->where('date', '<=', $end_date);

        $last_month_earns = 0;

        foreach ($works_for_month as $month_works) {
            $last_month_earns = $last_month_earns + $month_works->hours * $month_works->money_per_hour;
        }

        $data = [
            'works_for_month' => $works_for_month,
            'employee' => $user,
            'last_month_earns' => $last_month_earns,
        ];

        $pdf = PDF::loadView('pages/dashboard/other/employeePDF', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download($user->first_name . ' ' . $user->last_name . '-' . $year . '.' . $month . '.pdf');
    }

    public function companyPDF($company_id, $year, $month)
    {
        $datasets = [
            'days' => [],
            'employee' => [],
        ];

        $company = Company::find($company_id);

        $start_month = Carbon::make($year . '-' . $month)->firstOfMonth();

        $end_month = Carbon::make($year . '-' . $month)->lastOfMonth();

        $employees = $company->employees;
        dd($employees);

        $works_for_month = $company->works
            ->where('date', '>=', $start_month)
            ->where('date', '<=', $end_month)
            ->sortByDesc('date');

        $month_period = CarbonPeriod::create($start_month, $end_month);

        foreach ($month_period as $date) {

            $datasets['days'][] = $date->format('Y-m-d');
        }

        dd($datasets);



        foreach ($month_period as $date) {
            // $days_in_month[$date->format('Y-m-d')] = [
            //     'date' => $date->format('Y-m-d'),
            //     'data' => [],
            // ];

            $days_in_month[$date->format('Y-m-d')] = [];

            foreach ($works_for_month as $work) {
                $days_in_month[$work->date]['data'] = $work;
            }
        }

        dd($days_in_month);

        $pdf = PDF::loadView('pages/dashboard/other/companyPDF')->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($company->name . '-' . $year . '.' . $month . '.pdf');




        $tests = [
            'days' => [0, 1, 2],
            'employee' => [
                'tomas' => [0, 1, 2],
                'david' => [0, 1, 2],
            ],
        ];

        foreach ($works_for_month as $work) {
            $employee = $work->employee;
        }

        dd($employee);

        $datasets = [
            'days' => $days_in_month,
            'employees' => '',
        ];

        dd($datasets);

        dd($days_in_month);

        dd($works_for_month);

        $data = [
            'works_for_month' => $works_for_month,
        ];

        $pdf = PDF::loadView('pages/dashboard/other/companyPDF', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download($company->name . '-' . $year . '.' . $month . '.pdf');

        // dd($days_in_month);

        // return $days_in_month;


        // foreach ($days_in_month as $day) {
        //     foreach ($works_for_month as $work) {

        //         $test[] = $work->date;

        //         // if ($day == $work->date) {
        //         //     $test[$day] = $work->date .' -first';
        //         // } else {
        //         //     $test[$day] = $work->date. ' -second';
        //         // }
        //     }

        // }




        // foreach ($works_for_month as $work) {



        //     if ($days_in_month == $work->date) {
        //         $works[] = $work->date .' -first';
        //     } else {
        //         $works[] = $work->date. ' -second';
        //     }


        // }

        // dd($works);

        // dd($days_in_month);

        // // $start_day = ($start_month->format('d') * 10) / 10;

        // // $end_day = ($end_month->format('d') * 10) / 10;

        // // for ($start_day; $start_day <= $end_day; $start_day++) {
        // //     if ($start_day < 10) {
        // //         $days_in_month[] = $year . '-' . 0 . $month . '-' . 0 . $start_day;
        // //     } else {
        // //         $days_in_month[] = $year . '-' . 0 . $month . '-' . $start_day;
        // //     }
        // // };



        // // $test = [];

        // // foreach ($days_in_month as $date) {
        // //     $test[] = $date;
        // // }

        // // dd($test);

        // // foreach ($works_for_month as $work) {

        // //     $test[] = $work->date;

        // //     // if ($work->date == $date) {
        // //     //     $test[$date] = 'kokote';
        // //     // }

        // // }



        // // foreach ($days_in_month as $day) {
        // //     $test[$day] ='test';
        // // }

        // // dd($test);
        // // dd($days_in_month);


        // //dd($days_in_month[23]);

        // foreach ($works_for_month as $key => $work) {


        //     // if ($days_in_month[12] == $work->date) {
        //     //     $test[$work->date][] = $work;
        //     // }

        //     // $work_date[] = $work->date;

        //     // if ( $work->date == $days_in_month) {
        //     //     $test[] = 'kokote';
        //     // } else {
        //     //     $test[$work->date] = 'test';
        //     // }
        // }

        // dd($days_in_month);

        // dd($test);

        // dd($work_date);

        // dd($test);

        // dd($works_for_month);
        // return $works_for_month;



        // $company = Company::findOrFail($company_id);

        // $start_month = Carbon::make($year . '-' . $month)->firstOfMonth();

        // $end_month = Carbon::make($year . '-' . $month)->lastOfMonth();

        // $works_for_month = $company->works
        //     ->where('date', '>=', $start_month)
        //     ->where('date', '<=', $end_month)
        //     ->sortByDesc('id');

        // $data = [
        //     'test' => 'test',
        // ];


        // return view('pages.dashboard.other.companyPDF', [
        //     'data' => $data,
        // ]);





        // $test = Company::where('id', $company_id)->with('projects.users.work_times')->get();

        // dd($test);
        // dd($test[0]['works']);


        // foreach ($days_in_month as $day) {

        //     dd();


        //     $number = "2022-9-01";

        //     if ($company->works
        //         ->where('date', '=', $start_month)
        //          == $day) {
        //         $works[$day] = 'kokote';
        //     } else {
        //         $works[$day] = 'test'; 
        //     }
        // }

        //dd($works);
        // foreach ($days_in_month as $day) {

        //     $number = "2022-9-01";

        //     if ($number == $day) {
        //         $works[$day] = 'kokote';
        //     } else {
        //         $works[$day] = 'test'; 
        //     }
        // }


        // foreach ($works_for_month as $test=>$date) {
        //     dd($date);
        // }

        // foreach ($works_for_month as $work->date) {

        //     $works[] = $work;


        //     // if($work->date == $days_in_month){
        //     //     dd('test');
        //     // }


        // }

        // dd($works);



        // foreach ($works as $work) {

        //     $month = Carbon::make($work->date)->month;

        //     $year = Carbon::make($work->date)->format('Y');

        //     foreach ($works as $work) {

        //         $month = Carbon::make($work->date)->month;

        //         $year = Carbon::make($work->date)->format('Y');

        //         if (array_key_exists($year, $employee_date)) {

        //             if (!in_array($month, $employee_date[$year])) {

        //                 $employee_date[$year][] = $month;
        //             }
        //         } else {
        //             $employee_date[$year] = [$month];
        //         }
        //     }
        // }

    }
}
