<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user is an admin
            $user = Auth::user();
            if ($user->is_admin) { // Assumes you have an `is_admin` column in your users table
                return $next($request);
            }
        }

        // If not an admin, redirect to a different page or show an error
        return redirect('/'); // Redirect to home or a specific route
    }
}
