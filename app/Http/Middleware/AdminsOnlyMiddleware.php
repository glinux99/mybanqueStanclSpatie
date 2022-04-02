<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminsOnlyMiddleware
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
        if(session('user')!=null AND session('user')->hasRole('admin')){
            return $next($request);
        }elseif(session('user')!=null AND (session('user')->hasRole('caissier'))){
            session()->flash('error','no_autorization');
            return view('adminsCaissiers.delete_customers');
        }elseif(session('user')!=null AND (session('user')->hasRole('client'))){
            session()->flash('error','no_autorization');
            return view('clients.profilCli');
        }else{
            session()->flash('error','no_autorization');
            return redirect('/login');
        }
    }
}
