<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Session;

class CheckRedirection
{
  
    public function handle($request, Closure $next)
    {
        // Check if the session variable is set
        if (!Session::has('redirected_to_page') || !Session::get('redirected_to_page')) {
            // Optionally flash a message to the user
            Session::flash('error', 'You are not allowed to access this page.');

            // Redirect to a different page
            return redirect('/'); // Redirect to a default page or error page
        }

        // Clear the session variable after checking
        Session::forget('redirected_to_page');

        return $next($request);
    }
}
