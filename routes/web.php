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
    return view('welcome');
});
Route::get('/logout', function () {
    Auth::logout();
});



Route::any('/dashboard', 'App\Http\Controllers\MainController@dashboard')->middleware(['auth']);

Route::get('/updatebase/', 'App\Http\Controllers\MainController@updateBase');




require __DIR__.'/auth.php';
