<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Book;
use Input;

class FaqController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $kwords = '-';
	public function index()
	{
		//
		$kwords = Input::get('kword','');
		$whereStr = "book_name like '%".$kwords."%'";
		$cou = \App\Book::whereRaw($whereStr)->count();
		$faqs = \App\Book::whereRaw($whereStr)->get();
		$myResult = array('cou' => $cou,'faqs' => $faqs);
	//	echo $myResult;
		if($cou==0)
		{
			session()->flash('message_info','没有查询到结果!');
		}
		return view('faq',['faqs' => $myResult['faqs'], 'cou' => $myResult['cou'], 'kword' => '$kwords']);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		//
	}

}
