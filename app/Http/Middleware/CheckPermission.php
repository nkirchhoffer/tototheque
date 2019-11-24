<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $permission)
    {
        if (is_null($request->user())) {
            abort(403, 'Vous n\'êtes pas connecté.');
        }

        if (!$request->user()->hasPermission($permission)) {
            abort(403, 'Vous n\'avez pas la permission.');
        }

        return $next($request);
    }
}
