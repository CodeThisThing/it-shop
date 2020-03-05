<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function DeleteProduct(Request $request){
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
}
