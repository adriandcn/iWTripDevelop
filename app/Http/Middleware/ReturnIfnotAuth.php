<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use App\Models\Usuario_Operador;

class ReturnIfnotAuth
{
   /**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;
        protected $operador;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
                $this->model = new Usuario_Operador();
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
            
            if (!$this->auth->check())
		{
                     
			return new RedirectResponse(url('/'));
		}
                /*$operador = new $this->model;
		$operadorData = $operador::where('id_usuario_op',session('operador_id'))->first();
                //return $operadorData;
                if($operadorData->id_usuario!=session('user_id'))
                {
                    	return response('Unauthorized.', 401);
                    
                }*/

		return $next($request);
	}
}
