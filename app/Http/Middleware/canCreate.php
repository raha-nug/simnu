<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class canCreate
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
        if(session()->get('can_create') == 0){
            Alert::error('Oops', 'Anda Tidak Memiliki Akses');
            return redirect()->back();
        }
        return $next($request);
    }
}
