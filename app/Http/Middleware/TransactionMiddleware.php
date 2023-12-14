<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check_transaction = session()->has('transaction_id');
        if(!$check_transaction) return redirect()->route('transaction_page')->with('error', 'Harap Melakukan Transaksi Terlebih Dahulu');
        return $next($request);
    }
}
