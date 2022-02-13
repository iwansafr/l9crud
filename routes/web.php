<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/',function(){
        return view('admin.main');
    });
    Route::prefix('/post')->group(function(){
        Route::get('/',[PostController::class, 'index']);
        Route::get('add',function(){
            return view('admin.posts.edit');
        });
        Route::get('edit/{id}',[PostController::class,'edit']);
        Route::post('create',[PostController::class,'create']);
        Route::post('update/{id}',[PostController::class,'update']);
        Route::get('delete/{id}',[PostController::class,'delete']);
    });
    
});

Route::get('/login',function(){
    return view('login');
})->name('login');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/login');
})->name('logout');