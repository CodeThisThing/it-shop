<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

    public function GetCategory(){
        Category::all()->get();
    }
}
