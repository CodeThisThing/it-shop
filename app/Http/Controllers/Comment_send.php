<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class Comment_send extends Controller
{
    public function index(Request $request){
        $user_name=$request->get('user_name');
        $text=$request->get('text');
        session_start();
        $date=Carbon::today();
        DB::insert("INSERT INTO `comments`(`user_name`, `comment_text`, `product_id`,`created_at`) VALUES (?,?,?,?)",array($user_name,$text,$_SESSION['phone_id'],$date));
        return view('succes_comment');
    }

}
