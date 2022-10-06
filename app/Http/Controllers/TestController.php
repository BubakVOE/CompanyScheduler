<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.dashboard.other.test');


    }

    public function authentication()
    {
        return view('vendor.authentication-log.emails.new');
    }
}
