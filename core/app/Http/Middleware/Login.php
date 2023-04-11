<?php

namespace App\Http\Middleware;

use Closure;
use Alert;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        if($request->session()->exists('guiasid')){

            return $next($request);

        }else{

            Alert::error('Por favor, inicie sesión!.', 'Error!');
            return redirect('/admin');

        }




    }
}
