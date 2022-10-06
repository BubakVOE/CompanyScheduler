<?php

namespace App\Http\Controllers\Dashboard\other;

use File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;


class ActivityController extends Controller
{
    public function activity(Request $request)
    {
        return view('pages.dashboard.other.activity');
    }
}
