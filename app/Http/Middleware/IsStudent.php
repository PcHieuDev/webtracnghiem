<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsStudent
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if (auth()->user()->hasRole('teacher') || auth()->user()->hasRole('admin') || auth()->user()->hasRole('student'))  {
            return $next($request);
        }
        return redirect()->route('/');
    }
}
