<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Session;

class ClearCheckoutSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->is('checkout*')) {
            Session::forget('delivery_name');
            Session::forget('delivery_phone');
            Session::forget('delivery_address');
            Session::forget('redeem_points');
            Session::forget('redeem_discount');
        }

        return $next($request);
    }
}
