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

            return $works_for_month;
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
}
