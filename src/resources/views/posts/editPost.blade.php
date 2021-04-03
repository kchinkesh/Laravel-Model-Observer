@extends('laravel-model-observer::layouts.app')

@section('title')
Edit Post
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Post
                </div>
                <div class="card-body">
                    <form action="/post/update" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Post Content</label>
                            <textarea name="content" id="content" rows="5" class="form-control">{{$post->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" name="tags" value="{{$post->tags}}">
                        </div>
                        <div class="form-group">
                            <label for="user">Created By</label>
                            <input type="text" class="form-control" value="{{$post->user->name}}" readonly>
                        </div>
                        <div class="form-group text-center">
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>                    
            </div>
        </div>
    </div>
</div>

@endsection