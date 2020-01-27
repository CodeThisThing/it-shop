<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function AddOrder($product_id){
    if(isset($_POST['product_id'])){
    $phones=Phone::all()->where('id',$product_id);
    }
    DB::insert('Insert into orders (`order_product_name`, `order_product_id`, `order_product_cost`)VALUES(?,?,?) ',array($phones->get('Name'),$phones->get('id'),$phones->get('price')));
    }

}
