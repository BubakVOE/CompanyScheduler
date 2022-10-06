<?php

namespace App\Http\Controllers\Employee;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
use Laravolt\Avatar\Avatar;


use App\Models\ProjectUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // přidání avatara uživatelům
        $avatar = new Avatar(config('laravolt.avatar'));

        $user->avatar = $avatar->create("$user->first_name $user->last_name")->toBase64();

        $works = $user->work_times->sortByDesc('date');

        //  VČEREJŠEK
        $this_yesterday = Carbon::yesterday()->toDateString();

        $this_yesterday_work = $works->where('date', '=', $this_yesterday);

        $this_yesterday_number = Carbon::yesterday()->day;

        $this_yesterday_earns = 0;

        foreach ($this_yesterday_work as $yesterday_works) {
            $this_yesterday_earns = $this_yesterday_earns + $yesterday_works->hours * $yesterday_works->money_per_hour;
        }

        //  MINULÝ TÝDEN
        $last_week_start = Carbon::now()
            ->subWeek()
            ->startOfWeek()
            ->toDateString();

        $last_week_end = Carbon::now()
            ->subWeek()
            ->endOfWeek()
            ->toDateString();

        $last_week_works = $works->where('date', '>=', $last_week_start)
            ->where('date', '<=', $last_week_end);

        $last_week_number = Carbon::now()
            ->subWeek()
            ->weekOfYear;

        $last_week_earns = 0;

        foreach ($last_week_works as $week_works) {
            $last_week_earns = $last_week_earns + $week_works->hours * $week_works->money_per_hour;
        }

        //  MĚSÍC
        $last_month_start = Carbon::now()
            ->subMonth()
            ->startOfMonth()
            ->toDateString();

        $last_month_end = Carbon::now()
            ->subMonth()
            ->endOfMonth()
            ->toDateString();

        $last_month_works = $works->where('date', '>=', $last_month_start)
            ->where('date', '<=', $last_month_end);

        $last_month_number = Carbon::now()
            ->subMonth()
            ->month;

        $last_month_earns = 0;

        foreach ($last_month_works as $month_works) {
            $last_month_earns = $last_month_earns + $month_works->hours * $month_works->money_per_hour;
        }

        // projekty pro uživatele
        $project_ids = ProjectUsers::where('user_id', $id)->pluck('project_id')->all();

        $project_data = [];

        foreach ($project_ids as $project_id) {
            $project_data[] = Project::find($project_id);
        }

        // pokud rok není v URL
        if ($request->input('year') != null) {
            $year = $request->input('year');
        } else {
            $year = null;
        }

        if ($request->input('month') != null) {
            $month = $request->input('month');
        } else {
            $month = null;
        }

        // funkce volána z model/User
        $works = $user->work_times->sortByDesc('date');

        // Projíždí práci a vezme pouze jeden MĚSÍC
        $active = [];

        foreach ($works as $wrk) {
            $m = Carbon::make($wrk->date)->month;

            $y = Carbon::make($wrk->date)->format('Y');

            if (array_key_exists($y, $active)) {
                if (!in_array($m, $active[$y])) {
                    $active[$y][] = $m;
                }
            } else {
                $active[$y] = [$m];
            }
        }

        // odebrat u User -> worktimes
        unset($user->work_times);


        return view('pages.employee.profile', [
            'user' => $user,

            'active' => $active,

            'year' => $year ?? null,

            'month' => $month ?? null,

            'project_data' => json_encode($project_data),

            'this_yesterday_earns' => $this_yesterday_earns,
            'this_yesterday_number' => $this_yesterday_number,

            'last_week_earns' => $last_week_earns,
            'last_week_number' => $last_week_number,

            'last_month_earns' => $last_month_earns,
            'last_month_number' => $last_month_number,
        ]);





        // return view('pages.employee.settings');
    }

    public function records(Request $request, $id)
    {

        $user = User::findOrFail($id);

        // projekty pro uživatele
        $project_ids = ProjectUsers::where('user_id', $id)->pluck('project_id')->all();

        $project_data = [];

        foreach ($project_ids as $project_id) {
            $project_data[] = Project::find($project_id);
        }

        // pokud rok není v URL
        if ($request->input('year') != null) {
            $year = $request->input('year');
        } else {
            $year = null;
        }

        if ($request->input('month') != null) {
            $month = $request->input('month');
        } else {
            $month = null;
        }

        $works = $user->work_times->sortByDesc('date');

        // Projíždí práci a vezme pouze jeden MĚSÍC
        $active = [];

        foreach ($works as $wrk) {
            $m = Carbon::make($wrk->date)->month;

            $y = Carbon::make($wrk->date)->format('Y');

            if (array_key_exists($y, $active)) {
                if (!in_array($m, $active[$y])) {
                    $active[$y][] = $m;
                }
            } else {
                $active[$y] = [$m];
            }
        }


        return view('pages.employee.records', [
            'user' => $user,

            'active' => json_encode($active ?? null),

            'project_data' => json_encode($project_data),

            'year' => $year ?? 0,

            'month' => $month ?? 0,

        ]);
    }

    public function show($id, Request $request)
    {
        $user = User::findOrFail($id);

        // přidání avatara uživatelům
        $avatar = new Avatar(config('laravolt.avatar'));

        $user->avatar = $avatar->create("$user->first_name $user->last_name")->toBase64();

        $works = $user->work_times->sortByDesc('date');

        //  VČEREJŠEK
        $this_yesterday = Carbon::yesterday()->toDateString();

        $this_yesterday_work = $works->where('date', '=', $this_yesterday);

        $this_yesterday_number = Carbon::yesterday()->day;

        $this_yesterday_earns = 0;

        foreach ($this_yesterday_work as $yesterday_works) {
            $this_yesterday_earns = $this_yesterday_earns + $yesterday_works->hours * $yesterday_works->money_per_hour;
        }

        //  MINULÝ TÝDEN
        $last_week_start = Carbon::now()
            ->subWeek()
            ->startOfWeek()
            ->toDateString();

        $last_week_end = Carbon::now()
            ->subWeek()
            ->endOfWeek()
            ->toDateString();

        $last_week_works = $works->where('date', '>=', $last_week_start)
            ->where('date', '<=', $last_week_end);

        $last_week_number = Carbon::now()
            ->subWeek()
            ->weekOfYear;

        $last_week_earns = 0;

        foreach ($last_week_works as $week_works) {
            $last_week_earns = $last_week_earns + $week_works->hours * $week_works->money_per_hour;
        }

        //  MĚSÍC
        $last_month_start = Carbon::now()
            ->subMonth()
            ->startOfMonth()
            ->toDateString();

        $last_month_end = Carbon::now()
            ->subMonth()
            ->endOfMonth()
            ->toDateString();

        $last_month_works = $works->where('date', '>=', $last_month_start)
            ->where('date', '<=', $last_month_end);

        $last_month_number = Carbon::now()
            ->subMonth()
            ->month;

        $last_month_earns = 0;

        foreach ($last_month_works as $month_works) {
            $last_month_earns = $last_month_earns + $month_works->hours * $month_works->money_per_hour;
        }

        // projekty pro uživatele
        $project_ids = ProjectUsers::where('user_id', $id)->pluck('project_id')->all();

        $project_data = [];

        foreach ($project_ids as $project_id) {
            $project_data[] = Project::find($project_id);
        }

        // pokud rok není v URL
        if ($request->input('year') != null) {
            $year = $request->input('year');
        } else {
            $year = null;
        }

        if ($request->input('month') != null) {
            $month = $request->input('month');
        } else {
            $month = null;
        }

        // funkce volána z model/User
        $works = $user->work_times->sortByDesc('date');

        // Projíždí práci a vezme pouze jeden MĚSÍC
        $active = [];

        foreach ($works as $wrk) {
            $m = Carbon::make($wrk->date)->month;

            $y = Carbon::make($wrk->date)->format('Y');

            if (array_key_exists($y, $active)) {
                if (!in_array($m, $active[$y])) {
                    $active[$y][] = $m;
                }
            } else {
                $active[$y] = [$m];
            }
        }

        // odebrat u User -> worktimes
        unset($user->work_times);

        return view('pages.employee.show', [
            'user' => $user,

            'active' => $active,

            'year' => $year ?? null,

            'month' => $month ?? null,

            'project_data' => json_encode($project_data),

            'this_yesterday_earns' => $this_yesterday_earns,
            'this_yesterday_number' => $this_yesterday_number,

            'last_week_earns' => $last_week_earns,
            'last_week_number' => $last_week_number,

            'last_month_earns' => $last_month_earns,
            'last_month_number' => $last_month_number,
        ]);
    }
    

    public function settings($id)
    {
        return view('pages.employee.settings', [
            'user' => $id,
        ]);
    }

    public function updateEmployee(UpdateUserRequest $request)
    {

        try {
            $user = User::findOrfail($request->id);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->password = Hash::make($request->password) ?? $user->password;
            
            $user->email = $request->email;
            $user->money_per_hour = $request->money_per_hour;
            $user->mobile = $request->mobile;
            $user->username = $request->username;
            $user->user_color = $request->user_color;
            $user->address = $request->address;
            $user->apartment = $request->apartment;


            $user->save();

            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

}
