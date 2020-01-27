<?php

use App\Phone;
use Illuminate\Support\Facades\DB;

if(isset($_POST['product_id'])){
    $product_id=$_POST['product_id'];
    $phones=Phone::all()->where('id',$product_id);
}else{
    echo 'ERROR';
}
foreach ($phones as $phone)
DB::insert('Insert into orders (`order_product_name`, `order_product_id`, `order_product_cost`)VALUES(?,?,?) ',array($phone->get('Name'),$phone->get('id'),$phone->get('price')));
