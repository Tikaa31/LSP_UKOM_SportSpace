<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        // Cek apakah user sudah login dan merupakan admin
        if (
            !auth()->check() ||
            !auth()->user()->is_admin
        ) {
            abort(403, 'Kamu tidak memiliki akses ke halaman admin.');
        }

        return $next($request);
    }
}