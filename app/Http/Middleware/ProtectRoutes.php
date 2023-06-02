<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProtectRoutes
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the current route requires authentication
        if ($this->shouldAuthenticate($request)) {
            // Perform password authentication
            if (!$this->authenticate($request)) {
                // Password authentication failed
                return $this->unauthorizedResponse();
            }
        }

        return $next($request);
    }

    protected function shouldAuthenticate(Request $request)
    {
        // Add logic to determine if the current route requires authentication
        // For example, you can check the route path or name
        return $request->is('protected-route');
    }

    protected function authenticate(Request $request)
    {
        // Perform authentication by checking the entered password against the SQL database
        $password = $request->input('password');

        // Replace 'users' with your actual user table name
        $user = DB::table('users')->first();

        // Verify the password
        if ($user && Hash::check($password, $user->password)) {
            // Password is correct
            Auth::loginUsingId($user->id);
            return true;
        }

        return false;
    }

    protected function unauthorizedResponse()
    {
        // Customize the unauthorized response, such as redirecting back with an error message
        return redirect()->back()->with('error', 'Incorrect password');
    }
}
