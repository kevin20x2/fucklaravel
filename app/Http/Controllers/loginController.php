<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Redirect;

class loginController extends Controller {

	public function loginGet()
	{
		return view('login');
	}
	public function loginPost(Request $request)
	{
		$this->validate($request ,User::rules());
		$email = $request->get('email');
		$password = $request->get('password');
		if(Auth::attempt(['email' => $email, 'password' => $password],$request->get('remember')))
		{
			if(!Auth::user()->is_admin) 
			{
				return Redirect::route('user_home');
			}else {
				return Redirect::action('Admin\AdminController@index');

			}
		}else {
			return Redirect::route('login')
			->withInput()
			->withErrors('ÓÊ¼şºÍÃÜÂë²»Æ¥Åä!');
		}
	}
	public function logout()
	{
		if(Auth::check())
		{
			Auth::logout();
		}
		return Redirect::route('login');
	}

	
}
