<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lend;
use Illuminate\Http\Request;

use Input, Redirect;

class ReturnController extends Controller {

	public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.return');
    }

    public function store(Request $request) {
        $this->validate(
            $request, [
                'user_id' => 'required',
                'book_id' => 'required',
            ]
        );
        $user_id = Input::get('user_id');
        $book_id = Input::get('book_id');

        $delete_succeed = Lend::where('user_id', '=', "$user_id")
            ->where('book_id', '=', "$book_id")->delete();
        if ($delete_succeed) {
            return Redirect::to('admin/return');
        } else {
            return Redirect::back()->withErrors('删除失败！');
        }
    }
}