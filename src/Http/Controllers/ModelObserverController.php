<?php

namespace Kchinkesh\LaravelModelObserver\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kchinkesh\LaravelModelObserver\Models\ModelAction;

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
