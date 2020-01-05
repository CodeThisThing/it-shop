<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Samsung_phone;
use App\Phone;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    $phones = Phone::all();
    return view('Main',compact('phones'));
});
Route::get('/Samsung_phone','Samsung_phone@index');

Auth::routes();

//Route::get('/phones/{phone_id}','Product_controller@index');

Route::get('/phones/{phone_id}','Product_controller@index');

Route::get('/phones',function (){
    $phone = Phone::all();
return view('phone,show',compact('phone'));
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('category','CategoryController');
Route::post('/phones/{phone_id}/succes_send','Comment_send@index');
