<?php

use App\Http\Controllers\mailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\websiteController;
use App\Http\Controllers\WebsiteeController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/websites' , [userController::class , 'index']);
Route::post('/post' , [postController::class , 'store']);
Route::delete('/post/{post}' , [postController::class , 'destroy']);
Route::resource('/subscribe' , SubscribeController::class);
Route::resource('/website' , websiteController::class);