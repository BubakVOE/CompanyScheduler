<?php

namespace App\Http\Controllers\Dashboard\header;

use File;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use App\Models\WorkTime;
use Laravolt\Avatar\Avatar;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Cknow\Money\Money;

class DashboardController extends Controller
{
    // INDEX
    public function index()
    {
        $works = WorkTime::all();

        $users = User::all();

        $avatar = new Avatar(config('laravolt.avatar'));

        foreach ($users as $user) {
            $user->icon = $avatar->create("$user->first_name $user->last_name")->toBase64();
        }

        // $newest_works = $works->take(10);

        //  TÝDEN - subweek
        $last_week_start = Carbon::now()
            ->subWeek()
            ->startOfWeek()
            ->toDateString();

        $last_week_end = Carbon::now()
            ->subWeek()
            ->endOfWeek()
            ->toDateString();

        //  MĚSÍC - submonth
        $last_month_start = Carbon::now()
            ->subMonth()
            ->startOfMonth()
            ->toDateString();

        $last_month_end = Carbon::now()
            ->subMonth()
            ->endOfMonth()
            ->toDateString();

        // ROK - tento rok
        $last_year_start = Carbon::now()
            ->startOfYear()
            ->toDateString();

        $last_year_end = Carbon::now()
            ->endOfYear()
            ->toDateString();

        $last_week_works = $works->where('date', '>=', $last_week_start)
            ->where('date', '<=', $last_week_end);

        $last_month_works = $works->where('date', '>=', $last_month_start)
            ->where('date', '<=', $last_month_end);

        $last_year_works = $works->where('date', '>=', $last_year_start)
            ->where('date', '<=', $last_year_end);

        $week_earns = 0;

        $month_earns = 0;

        $year_earns = 0;

        foreach ($last_week_works as $last_week_work) {
            $week_earns = $week_earns + $last_week_work['hours'] * $last_week_work['money_per_hour'];
        }



        foreach ($last_month_works as $last_month_work) {
            $month_earns = $month_earns + $last_month_work['hours'] * $last_month_work['money_per_hour'];
        }

        foreach ($last_year_works as $last_year_work) {
            $year_earns = $year_earns + $last_year_work['hours'] * $last_year_work['money_per_hour'];
        }


        $companies = Company::with('projects')
            ->orderBy('id', 'DESC')
            ->get();

        $projects = Project::all();


        $db_count = (count(File::allFiles(storage_path() . '/app/public/db_backup')));

        $companies_count = count($companies);
        $projects_count = count($projects);
        $users_count = count($users);
        $works_count = count($works);

        return view('pages.dashboard.header.dashboard', [
            'week_earns' => $week_earns,
            'month_earns' => $month_earns,
            'year_earns' => $year_earns,

            'companies' => $companies,

            'companies_count' => $companies_count,
            'projects_count' => $projects_count,
            'users_count' => $users_count,
            'works_count' => $works_count,
            'db_count' => $db_count,
        ]);
    }
}
