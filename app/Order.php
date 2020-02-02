<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function AddOrder($product_id){
    if(isset($_POST['product_id'])){
    $phones=Phone::all()->where('id',$product_id);
    }
    DB::insert('Insert into orders (`order_product_name`, `order_product_id`, `order_product_cost`)VALUES(?,?,?) ',array($phones->get('Name'),$phones->get('id'),$phones->get('price')));
    }
    public function GetOrder(){
        $user_id=Auth::user()->id;
        $order_list=DB::select('SELECT `order_id`, `order_product_name`, `order_product_id`, `order_product_cost`, `order_product_quantity`, `order_user_id` FROM `order` WHERE `order_user_id`=?',array($user_id));
        return $order_list;

    }
}
