<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function HighlightUtilities\splitCodeIntoArray;

class OrderListController extends Controller
{
    public function index(){
        $confirmed_orders=DB::select('SELECT `id`, `orders_id`, `created_at`, `updated_at` FROM `order_confirmed`');

        return view('order_list',compact('confirmed_orders'));
    }


}
