<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanManageSite
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! $user->canManageSite()) {
            abort(403, 'دسترسی به مدیریت سایت ندارید.');
        }

        return $next($request);
    }
}
