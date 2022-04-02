<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminsOrAgentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('user')!=null AND (session('user')->hasRole('admin') OR session('user')->hasRole('caissier'))){
            return $next($request);
        }else{
            session()->flash('error','no_autorization');
            return redirect('/login');
        }
    }
}
