<?php

Route::get('actions', 'ModelObserverController@index');
Route::get('actions/view/{id}', 'ModelObserverController@viewDetail');

Route::get('hellp', function(){
        return 'Hello from the package';
    });