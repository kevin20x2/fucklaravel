<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Book;
use App\Reserve;
use Redirect , Input, Auth;

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
//		Reserve::find()
		return view('admin.books.show')->withBook(Book::find($id))->with('reserve_num', 666);
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
