<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	return redirect('/home');
});

Auth::routes();

// Route::get('profile', function() {
//     return view('home');
// })->middleware('auth');


Route::resources([
    'restaurent' => 'restaurent_controller',
    'cart' => 'cart_controller',
    'profile' => 'profile_controller'
]);

Route::get('/search_restaurent','restaurent_controller@all_restaurents');

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('/login','user_controller');

Auth::routes();
