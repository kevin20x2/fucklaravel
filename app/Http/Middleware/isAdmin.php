<?php namespace App\Http\Middleware;

use Closure;
use Auth,Redirect;

class isAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!Auth::check()){
			return Redirect::route('login');
		}else {
			if(!Auth::user()->is_admin) {
				session()->flash('message_warning','你不是管理员!');
				return Redirect::route('user_home');
			}
		}
		return $next($request);
	}

}
