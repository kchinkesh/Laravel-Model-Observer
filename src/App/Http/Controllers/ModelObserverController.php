<?php

namespace kchinkesh\LaravelModelObserver\App\Http\Controllers;

use App\Http\Controllers\Controller;
use kchinkesh\LaravelModelObserver\App\Models\ModelAction;

class ModelObserverController extends Controller
{
    //
    public function index()
    {
        # code...
        $logs = ModelAction::all();
        return view('laravel-model-observer::model-logs',compact('logs'));
    }

    public function viewDetail($id)
    {
        $log = ModelAction::find($id);
        return view('laravel-model-observer::model-detailed-log',compact('log'));
    }
}
