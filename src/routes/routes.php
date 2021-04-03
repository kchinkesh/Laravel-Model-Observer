<?php

use Illuminate\Support\Facades\Route;
use Kchinkesh\LaravelModelObserver\Http\Controllers\ModelObserverController;
use Kchinkesh\LaravelModelObserver\Http\Controllers\PostController;


Route::middleware(['web','auth'])->group(function () {
    Route::get('posts', [PostController::class,'index']);
    Route::get('post/new', [PostController::class,'create']);
    Route::get('post/edit/{id}', [PostController::class,'edit']);
    Route::get('post/delete/{id}', [PostController::class,'delete']);
    Route::post('post/create', [PostController::class,'store']);
    Route::post('post/update', [PostController::class,'update']);
    Route::get('actions', [ModelObserverController::class,'index']);
    Route::get('actions/view/{id}', [ModelObserverController::class,'viewDetail']);
});