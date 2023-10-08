<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class canUpdate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->start())
            session()->start();
        if(session()->get('can_update') == 0){
            Alert::error('Oops', 'Anda Tidak Memiliki Akses');
            return redirect()->back();
        }
        return $next($request);
    }
}
