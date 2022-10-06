<?php

namespace App\Connector\Dashboard;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class showConnector
{
    public function show($id, Request $request)
    {
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

        $user = User::find($id);

        $works = $user->work_times->sortByDesc('date');

        $active = [];

        foreach ($works as $wrk) {
            $m = Carbon::make($wrk->date)->month;

            $y = Carbon::make($wrk->date)->format('Y');

            if (array_key_exists($y, $active)) {
                if (! in_array($m, $active[$y])) {
                    $active[$y][] = $m;
                }
            } else {
                $active[$y] = [$m];
            }
        }

        if ($year == null) {
            return view('dashboard.show', [
                'user' => $user,
                'active' => $active,
                'works' => null,
                'year' => $year,
            ]);
        }

        if ($month == null) {
            return view('dashboard.show', [
                'user' => $user,
                'active' => $active,
                'works' => null,
                'year' => $year,
            ]);
        }

        $works = $user->work_times->sortByDesc('date');

        $start_date = Carbon::make('2022-'.$month)->firstOfMonth();

        $end_date = Carbon::make('2022-'.$month)->lastOfMonth();

        $works_for_month = $works->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date);

        return view('dashboard.show', [
            'user' => $user,
            'active' => $active,
            'works' => $works_for_month,
            'year' => $year,
        ]);
    }
}
