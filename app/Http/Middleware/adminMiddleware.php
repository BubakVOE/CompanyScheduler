<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->is_admin == 1) {
            return $next($request);
        } else {
            return redirect('/')->with('message', 'Nemáš dostatečná práva');
        }

        return $next($request);
    }
}
