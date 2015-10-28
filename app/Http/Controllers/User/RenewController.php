<?php namespace App\Http\Controllers\User;

/**
 * Created by PhpStorm.
 * User: mrzero
 * Date: 15/10/28
 * Time: 下午2:49
 * 续借控制器
 */

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lend;
use Illuminate\Http\Request;
use Input, Redirect, DB;

class RenewController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return 'this is /user/renew';
    }

    public function store(Request $request) {
        $booksToRenew = Input::get('checkbox');
        $tmp_timestamp = strtotime('today');
        foreach($booksToRenew as $id) {
            $record = DB::table('lends')
                ->select('id', 'due_date', 'continued')
                ->where('book_id', $id)
                ->get();
            $record_id = $record[0]->id;
            $due_date = $record[0]->due_date;
            $has_renewed = $record[0]->continued;

            // 是在到期3天内续借
            $cond1 = $due_date - $tmp_timestamp <= 3*24*60*60; // 3天

            // 没有续借过
            $cond2 = !$has_renewed;

            // 没有被人预约
            $reserve = DB::table('reserves')
                ->select('id')
                ->where('book_id', $id)
                ->get();
            $cond3 = empty($reserve);

//            var_dump($cond1);
//            var_dump($cond2);
//            var_dump($cond3);

            if($cond1 and $cond2 and $cond3) {
                $lend = Lend::find($record_id);
                $lend->lend_date = $tmp_timestamp;
                $lend->due_date = strtotime('+30 days', $tmp_timestamp);
                $lend->continued = 1;
                $lend->save();
            }

        }

        return Redirect::to('/user/home')->with('message_success', '续借完成！');
    }

}