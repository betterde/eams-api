<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DynamicSwitchGuard
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $guard = $request->get('guard');
        if ($guard) {
            Config::set('auth.passport.guard', $guard);
        }

        return $next($request);
    }
}
