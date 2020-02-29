<?php

namespace App\Http\Controllers;

use App\Category;
use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($phone_category)
    {
        $phones = Phone::all()->where('id_category',$phone_category);
        return view('Main',compact('phones'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category_id=$request->input('id');
        $category_name=$request->input('name');
        if(isset($request)){
            DB::update('UPDATE `categories` SET `category`=? WHERE id=?',array($category_name,$category_id));
        }
    }

    public function delete(Request $request) {
        $category_id=$request->get('id');
        if(isset($request)){
            DB::delete('DELETE FROM `categories` WHERE id=?',array($category_id));
        }


    }

    public function Category_add(Request $request){
        $category_name=$request->input('category');
        if (isset($request)){
            DB::insert('INSERT INTO `categories`(`category`) VALUES (?)',array($category_name));

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }



}
