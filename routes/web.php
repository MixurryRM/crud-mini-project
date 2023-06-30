<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('layout.master');
// });

Route::get('/',[PostController::class,'createPage'])->name('post#createPage');
Route::post('create',[PostController::class,'create'])->name('post#create');

Route::get('read/page',[PostController::class,'readPage'])->name('post#readPage');
Route::get('delete/{id}',[PostController::class,'delete'])->name('post#delete');

Route::get('edit/page/{id}',[PostController::class,'editPage'])->name('post#editPage');
Route::post('update',[PostController::class,'update'])->name('post#update');
