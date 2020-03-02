<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function Order_Confirm(Request $request)
    {
        if (isset($request)) {
            $orders[] =$request->all();

            foreach($orders as $order) {
                DB::table('order')->where('order_id','=',$order)->delete();
            }
            DB::table('order_confirmed')->insert([
                'orders_id' => json_encode($orders)
            ]);

        }

    }
}
