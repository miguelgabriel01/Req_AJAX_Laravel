<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

Route::get('/admin',[AuthController::class,'dashboard'])->name('admin');
Route::get('/admin/login',[AuthController::class,'showFormLogin'])->name('admin.login');
Route::get('/admin/logout',[AuthController::class,'logout'])->name('admin.logout');

Route::post('/admin/login/do',[AuthController::class,'login'])->name('admin.login.do');
