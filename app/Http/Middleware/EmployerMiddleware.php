<?php

// app/Http/Middleware/Employer.php

// app/Http/Middleware/EmployerMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerMiddleware
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
        if (Auth::guard('employer')->check()) {
            return $next($request);
        }

        return redirect()->route('employer.login');
    }
}
