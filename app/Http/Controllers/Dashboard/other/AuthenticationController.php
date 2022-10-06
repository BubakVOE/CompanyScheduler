<?php

namespace App\Http\Controllers\Dashboard\other;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthenticationController extends Controller
{
    public function index()
    {

        // foreach ($user_ids as $user_id) {
        //     $users_data[] = [
        //         'data' => User::find($user_id)->authentications,
        //     ];




        $users = User::all();

        return view('pages.dashboard.other.authentication', [
            'users' => $users,
        ]);
    }
}
