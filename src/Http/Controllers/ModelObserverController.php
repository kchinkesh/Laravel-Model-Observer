<?php

namespace Kchinkesh\Laravel-model-observer\src\Http\Controllers\;

use Illuminate\Http\Request;

class ModelObserverController extends Controller
{
    //
    public function index()
    {
        # code...
        $logs = UserAction::all();
        return view('admin.model-logs',compact('logs'));
    }

    public function viewDetail($id)
    {
        $log = UserAction::find($id);
        return view('admin.model-detailed-log',compact('log'));
    }
}
