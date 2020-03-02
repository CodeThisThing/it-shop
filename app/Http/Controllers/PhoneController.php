<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function AddProduct(Request $request){
        $name=$request->input('name');
        $price=$request->input('price');
        $img=$request->input('img');
        $screen=$request->input('screen');
        $proc=$request->input('processor');
        $camera=$request->input('camera');
        $memory=$request->input('memory');
        $material=$request->input('material');
        $category=$request->input('category');
        if(isset($name,$price,$img,$screen,$proc,$camera,$memory,$material,$category)){
            DB::insert('INSERT INTO `phones`(`Name`, `price`, `Image`, `Screen_info`, `processor_info`, `camera_info`, `memory_info`, `material_info`, `id_category`)
            VALUES (?,?,?,?,?,?,?,?,?)',array($name,$price,$img,$screen,$proc,$camera,$memory,$material,$category));
        }
    }
    public function delete_product(Request $request){
        $product_id=$request->get('id');
        if(isset($product_id)) {
            DB::delete('DELETE FROM `comments` WHERE product_id=?',array($product_id));
            DB::table('phones')->where('id','=',$product_id)->delete();

        }
    }
}
