<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdministrator
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'administrator') {
            return $next($request);
        }else if (Auth::user()->role === 'admin') {
            return $next($request);

        }else if (Auth::user()->role === 'staff') {
            return $next($request);
        }else{
    }
        return redirect('/')->withErrors('Anda Tidak Memiliki Akses');
}
}
