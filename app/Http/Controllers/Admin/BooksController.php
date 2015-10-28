<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Book;
use App\Reserve;
use Redirect , Input, Auth, DB;

use Illuminate\Http\Request;

class BooksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('admin.books.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$this->validate($request,[
			'book_name' => 'required',
			'author' => 'required',
			'ISBN' => 'required',
			'press_name' => 'required',
			'press_date' => 'required',
			'url' => 'required',
			'in_use' => 'required',
			]);
		$book = new Book;
		$book ->book_name = Input::get('book_name');
		$book ->author = Input::get('author');
		$book ->ISBN = Input::get('ISBN');
		$book ->press_name = Input::get('press_name');
		$book ->press_date = Input::get('press_date');
		$book ->url = Input::get('url');
		$book ->in_use = Input::get('in_use');
	//	$book ->id = 1;
		if($book->save()) {
			return Redirect::to('admin');
		}
		else {
			return Redirect::back()->withInput()->withErrors('fail to save!');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$today = strtotime('today');

		// 这本书被预约次数
		$result = DB::table('reserves')
			->select('id')
			->where('book_id', $id)
			->where('over_date', '<', $today)
			->get();
		$reserve_num = count($result);

		// 用户预约书数目
		$user_id = Auth::user()->id;
		$user_reserve_record = DB::table('reserves')
			->select('id')
			->where('user_id', $user_id)
			->where('over_date', '<', $today)
			->get();
		$user_reserve_count = count($user_reserve_record);
		$reserve_too_many = $user_reserve_count > 0;

		return view('admin.books.show')->withBook(Book::find($id))
			->with('reserve_num', $reserve_num)
			->with('reserve_too_many', $reserve_too_many);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$book = Book::find($id);
		if($book!=NULL)
		$book -> delete();
		return Redirect::to('admin');
		//
	}

}
