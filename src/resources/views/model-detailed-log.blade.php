@extends('laravel-model-observer::layouts.app')

@section('title')
{{$log->model}} Actions
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">{{$log->model}}</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/actions">Model Logs</a></li>
                    <li class="breadcrumb-item active">Model Action Detail</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-th-large"></i> General Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>User</td>
                            <td>{{$log->user->email}}</td>
                        </tr>
                        <tr>
                            <td>Timestamp</td>
                            <td>{{$log->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-refresh"></i> Change Information
                    <a href="/actions"><span class="badge badge-primary pull-right"><i class="fa fa-arrow-left"></i>
                            back</span></a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Change Type</td>
                            <td>{{$log->action}}</td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>{{$log->model}}</td>
                        </tr>
                        <tr>
                            <td>IP Address</td>
                            <td>{{$log->ip_address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @php
    $old = ($log->models)['old'] ;
    $new = ($log->models)['new'] ;
    $changed = ($log->models)['changed'] ;
    @endphp

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-trash"></i> Old Values
                </div>
                <div class="card-body">
                    <table class="table">
                        @if($old)
                            @foreach($old as $k=>$v)
                                <tr>
                                    <td>{{$k}}</td>
                                    <td>{{$v}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No Values</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fa fa-plus"></i> New Values
                </div>
                <div class="card-body">
                    <table class="table">
                        @if($new)
                            @foreach($new as $k=>$v)
                                <tr class="{{(@$new[$k]==@$changed[$k] && @$changed[$k] !='')?'bg-danger':''}}">
                                    <td>{{$k}}</td>
                                    <td>{{$v}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No Values</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection