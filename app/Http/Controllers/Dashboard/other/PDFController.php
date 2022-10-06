<?php

namespace App\Http\Controllers\Dashboard\other;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PDFController extends Controller
{
    // from EMPLOYEE
    public function generatePDF($id, $year, $month)
    {
        $user = User::findOrFail($id);

        $works = $user->work_times->sortByDesc('date');

        $start_date = Carbon::make($year.'-'.$month)
            ->subDay()
            ->firstOfMonth();

        $end_date = Carbon::make($year.'-'.$month)->lastOfMonth();

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

        $pdf = PDF::loadView('pages/employee/workerPDF', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('myPDF.pdf');
    }

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

    public function companyPDF($company_id, $year, $month)
    {
        $company = Company::findOrFail($company_id);

        $start_date = Carbon::make($year.'-'.$month)->firstOfMonth();

        $end_date = Carbon::make($year.'-'.$month)->lastOfMonth();

        $works_for_month = $company->works
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->sortByDesc('date');

        $start_day = ($start_date->format('d') * 10) / 10;
        $end_day = ($end_date->format('d') * 10) / 10;

        for ($day_in_month = $start_day; $day_in_month <= $end_day; $day_in_month++) {
            if ($day_in_month < 10) {
                $days_in_month[] = $year.'-'.$month.'-'. 0 .$day_in_month;
            } else {
                $days_in_month[] = $year.'-'.$month.'-'.$day_in_month;
            }
        }

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

        $data = [
            'works_for_month' => $works_for_month,
        ];

        $pdf = PDF::loadView('pages/dashboard/other/companyPDF', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download($company->name.'-'.$year.'.'.$month.'.pdf');
    }

    public function employeePDF($user_id, $year, $month)
    {
        $user = User::findOrFail($user_id);

        $works = $user->work_times->sortByDesc('date');

        $start_date = Carbon::make($year.'-'.$month)
            ->firstOfMonth()
            ->toDateString();

        $end_date = Carbon::make($year.'-'.$month)
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

        return $pdf->download($user->first_name.' '.$user->last_name.'-'.$year.'.'.$month.'.pdf');
    }
}
