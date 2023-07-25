<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;

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
Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
    Route::get('/navbar', [SesiController::class, 'navbar']);
});
Route::get('/home',function(){
    return redirect('/arsip');
});
Route::middleware(['auth'])->group(function(){
    //logout
    Route::get('/logout', [SesiController::class, 'logout']);
    //index dashboard
    Route::get('/arsip', [AdminController::class, 'index']);
    //kelola user
    Route::get('/arsip/kelola-user', [AdminController::class, 'kelola']);
    Route::post('/arsip/kelola-user/save', [AdminController::class, 'adduser']);
    Route::get('/arsip/kelola-user/del/{id}', [AdminController::class, 'deluser']);
    //edit user
    Route::get('/arsip/editprofil', [AdminController::class, 'editprofil']);
    Route::post('/arsip/editprofile/save/{id}', [AdminController::class, 'saveprofil']);
    //upload file
    Route::get('/arsip/uploadfile', [AdminController::class, 'uploadfile']);
    Route::post('/arsip/uploadfile/savefile', [AdminController::class, 'savefile']);
    Route::get('/arsip/uploadfile/delfile/{id}', [AdminController::class, 'delfile']);
    Route::post('/arsip/uploadfile/editfile/{id}', [AdminController::class, 'editfile']);
    //file
    Route::get('/arsip/file', [AdminController::class, 'file']);


});