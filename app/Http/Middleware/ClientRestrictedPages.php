<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ClientRestrictedPages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $loggedUser = \Auth::user();

        if ($loggedUser == null || !$loggedUser->hasAnyRoles('Admin')) {
            return redirect()->route('index')->with('error', 'Acesso negado!');
        }
        return $next($request);
    }
}
