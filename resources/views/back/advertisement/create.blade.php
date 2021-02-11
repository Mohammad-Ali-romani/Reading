@extends('back.layouts.master')
@section('title','Dashboard | Create advertisement')
@section('advertisement','active')
@section('title_content')
    <a href="{{route('advertisement.index')}}" class="navbar-brand">Advertisement</a>
@endsection
@section('content')
<div class="card form-me ml-auto mr-auto">
    <div class="card-header card-header-primary">
        <h4 class="card-title">New Advertisement</h4>
        <p class="card-category">Create New Advertisement</p>
    </div>
    <div class="card-body">
        <form action="{{route('advertisement.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- title --}}
            <div class="form-group mt-2">
                <label class="bmd-label-floating">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            {{-- content --}}
            <div class="form-group mt-2">
                <label class="bmd-label-floating">Content</label>
                <textarea  name="content" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <div class="custom-file mt-2 mb-3">
                <input type="file" class="custom-file-input" name="upload_photo">
                <label class="custom-file-label  mt-2 " for="customFile">Chosses file</label>
            </div>
            <button type="submit" class="btn btn-primary pull-right mt-2 float-right">Add Advertisement</button>
        </form>
    </div>
</div>
@endsection
