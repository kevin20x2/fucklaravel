<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Reserve;
use Redirect, Input, Auth;

class ReserveController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return 'this is user/reserve';
	}

	public function store(Request $request) {
		$today = strtotime('today');
		$over_date = strtotime('+15 days', $today);

		$book_id = Input::get('book-id');
//		var_dump($book_id);
		$reserve = new Reserve;
		$reserve->user_id = Auth::user()->id;
		$reserve->book_id = intval($book_id);
		$reserve->reserve_date = $today;
		$reserve->over_date = $over_date;
		$reserve->save();

		return Redirect::to("/books/$book_id")->with('message_success', '你已成功预约本书');
	}
}
