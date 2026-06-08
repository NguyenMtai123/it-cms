<?php

namespace Platform\Core\ACL\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {

            // QUAN TRỌNG: tránh redirect loop
            if ($request->is('admin/login')) {
                return $next($request);
            }

            return redirect()->guest('/admin/login');
        }

        return $next($request);
    }
}
