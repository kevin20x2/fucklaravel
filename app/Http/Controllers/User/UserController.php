<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Lend;
use App\Book;
use DB;
use Auth;
use Redirect;

class UserController extends Controller {

	//
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function home()
	{
		$querys = DB::table('lends')
		->join('books','lends.book_id','=','books.id')
		->select('book_id', 'book_name','author','lend_date','due_date','is_returned')
		->where('user_id',Auth::user()->id)
		->get();
		$today = strtotime('today');
//		var_dump($querys);
		return view('user.home')->with('querys',$querys);
	}
	public function edit()
	{
		return view('user.edit');
	}
	public function update(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
		]);
		Auth::user()->update($request->all());
		return Redirect::route('user_home');
	}

}
