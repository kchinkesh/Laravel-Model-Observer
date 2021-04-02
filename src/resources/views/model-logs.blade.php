@extends('layouts.app')

@section('template_title')
Model Logs
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Model Logs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Model Logs</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<style>
    .clickable-row:hover {
      cursor: pointer;
    }
</style>
<!-- Main content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Model Logs
                    <span class="badge badge-primary pull-right">{{ count($logs) }} logs</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm data-table">
                            <thead>
                                <tr class="success">
                                    <th>S. No.</th>
                                    <th>User</th>
                                    <th>Model</th>
                                    <th>Action</th>
                                    <th>IP</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                <tr class="clickable-row" data-href="{{ url('actions/view/'. $log->id) }}"
                                    data-toggle="tooltip" title="View Detail">
                                    <td>{{$log->id}}</td>
                                    <td>{{$log->user->email}}</td>
                                    <td>{{$log->model}}</td>
                                    <td>{{$log->action}}</td>
                                    <td>{{$log->ip_address}}</td>
                                    <td>{{$log->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
@endsection