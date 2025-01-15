<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveLastVisited
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Simpan URL terakhir jika pengguna sedang login
        if (Auth::check() && $request->is('dashboardMenu*')) {
            session(['last_visited' => $request->url()]);
        }

        return $next($request);
    }
}
