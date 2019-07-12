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

Auth::routes();

Route::get('/limit' , function (){
	return view('limit');
})->name('limit');

Route::get('/',function (){
	# code...
	return redirect()->route('login');
});

Route::middleware(['web', 'Admin'])->group(function () {
    
    Route::get('/admin','HomeController@index');

    // show and edit slider
    Route::get('/admin/slider','SliderController@index');

});