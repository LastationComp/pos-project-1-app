<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTransactionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('transaction_id')) if(session()->has('transaction_id')) return redirect()->route('confirmation_checkout_page')->with('error', 'Selesaikan Transaksi Anda, Atau tekan batal!');
        return $next($request);
    }
}
