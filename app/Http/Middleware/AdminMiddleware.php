<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $checkAdmin = session()->get('role');
        if (!$checkAdmin == 'admin') return redirect()->route('adminEmployeeLogin')->with('error','kamu tidak ada akses');
        if (!$checkAdmin == 'employee') return redirect()->route('adminEmployeeLogin')->with('error', 'kamu tidak ada akses');
        return $next($request);
    }
}
