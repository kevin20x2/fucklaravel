<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Reserve;
use Redirect;

class ReserveController extends Controller {

	//
	public function work(Request $request)
	{
		$user = $request->get('user_id');
		echo $user;
		if($user==NULL){
			session()->flash('message_warning','没有登录!');
			return Redirect::back()
			->withInput()
			->withErrors('没有登录!');
		}
		else {
		$book_id = $request->get('book_id');
		$reserve = new Reserve;
		$reserve -> user_id = $user;
		$reserve -> book_id = $book_id;
		$reserve -> reserve_date = date('Ymd');
		if($reserve->save())
		{
			session()->flash('message_success','保存成功!');
			echo 'sucess';
			return Redirect::back();
		}
		else {
			return Redirect::back()
			->withInput()
			->withErrors('fail!');
		}

		}
	}

}
