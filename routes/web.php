<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudscontroller;



Route::get('/', function () {
    return view('welcome');
});
Route::get('add',[crudscontroller::class , "create"] );
Route::get('show',[crudscontroller::class , "index"] );
Route::post('adddone',[crudscontroller::class , "store"] );
Route::get('delete/{id}',[crudscontroller::class , "destroy"] );
Route::get('edit/{id}',[crudscontroller::class , "edit"] );
Route::post('editdone/{id}',[crudscontroller::class , "update"] );
