<?php

namespace App\Http\Middleware;

use App\Models\super_admin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $checkSuperAdmin = session()->get('roles');
        if (!$checkSuperAdmin == 'super_admin') return redirect()->route('superadmin.login')->with('error','kamu tidak ada akses');
        return $next($request);
    }
}
