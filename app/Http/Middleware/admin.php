<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        if (auth()->check() && auth()->user()->kategori == "admin") {
            return $next($request);
          }
        //  return redirect(‘/’);
        return response()->json([
            'type' => 'failed',
            'message' => 'Tidak Ada Ijin',
        ],403);
    }
}
