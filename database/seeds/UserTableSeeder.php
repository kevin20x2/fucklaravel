<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Grade;
use App\Book;
use App\Lend;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('lends')->delete();
        DB::table('users')->delete();
		User::create([
		'id' => '1',
		'name' => '郑文凯',
		'email' => '123@qq.com',
		'password' => Hash::make('123'),
		'is_admin' => 1
		]);
		User::create([
		'id' => '2',
		'name' => '陈翔宇',
		'email' => '1@qq.com',
		'password' => Hash::make('1'),
		'is_admin' =>0
		]);
		DB::table('books') -> delete();
		Book::create([
		'id' =>'1',
		'book_name' => '书名',
		'author' => '作者',
		'ISBN' => '123456',
		'press_name' => '出版社',
		'press_date' => '123456',
		'url' => '链接',
		'in_use' => '0',
		]);
		Lend::create([
		'user_id' => '2',
		'book_id' => '1',
		'lend_date' => '1234',
		'due_date' => '2345',
		'return_date' => '3456',
		'continued' => '1',
		'is_returned' => '0',
		]);

       
    }

}
