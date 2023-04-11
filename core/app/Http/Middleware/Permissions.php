<?php

namespace App\Http\Middleware;

use Closure;
use Alert;

class Permissions
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

        $type = session()->get('guiastype');

        if($type == 'Rentas ADM' OR $type == 'WebMaster'){


            return $next($request);

        }else{

            Alert::error('No posee permisos para esta acción!.', 'Error!');
            return redirect('/forms_i');


        }




    }
}
