<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
public function Category_add(Request $request){
    $category_name=$request->input('name');
    if (isset($request)){
        DB::insert("INSERT INTO `categories`(`category`) VALUES (?)",array($category_name));

    }
}
}
