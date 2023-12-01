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
        $checkSuperAdmin = super_admin::find(session()->get('auth_id'));
        if (!$checkSuperAdmin) return redirect()->route('login')->with('error','kamu tidak ada akses');
        return $next($request);
    }
}
