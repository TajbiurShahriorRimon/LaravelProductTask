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

use Illuminate\Support\Facades;

Route::get('/', function () {
    echo "Test request";
    //return view('welcome');
});


Route::get('/login', ['uses'=> 'LoginController@index']);
//Route::get('/login', [LoginController::class,'index']); for v8
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LogoutController@index');

Route::group(['middleware'=>['sess']], function(){

    Route::get('/home', ['as'=>'home.index','uses'=>'HomeController@index'])->middleware('sess');
    //Route::get('/home', 'HomeController@index')->name('home.index');

    Route::get('/user/list', 'UserController@list')->name('user.list');
    Route::get('/user/details/{id}', 'UserController@details');

    Route::group(['middleware'=>['type']], function(){
        Route::get('/user/create', 'UserController@create')->name('user.create');
        Route::post('/user/create', 'UserController@insert')->name('user.insert');
        Route::get('/user/edit/{id}', 'UserController@edit');
        Route::post('/user/edit/{id}', 'UserController@update');
        Route::get('/user/delete/{id}', 'UserController@delete');
        Route::post('/user/delete/{id}', 'UserController@destroy');
    });

});

Route::resource('/product', 'ProductController');

Route::get('/createProduct', function (){
    return view('product.create');
});

Route::post('/createProduct', 'ProductController@store');

Route::get('/productList', 'ProductController@index');
Route::get('/product/edit/{id}', 'ProductController@modify');
Route::post('/product/edit/{id}', 'ProductController@updateProduct');
Route::get('/product/delete/{id}', 'ProductController@delete');
