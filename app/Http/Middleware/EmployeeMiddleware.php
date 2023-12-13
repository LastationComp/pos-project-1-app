<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check_employee = session()->get('role');
        if ($check_employee != 'employee') return redirect()->route('adminEmployeeLogin')->with('error', 'kamu tidak ada akses');
        return $next($request);
    }
}
