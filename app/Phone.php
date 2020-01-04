<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phone extends Model
{

    public function find($id){


        return  DB::table('phones')->where('id',$id)->get();
    }

}
