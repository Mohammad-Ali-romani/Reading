@extends('back.layouts.master')
@section('title','Dashboard | Edit advertisement')
@section('advertisement','active')
@section('title_content')
    <a href="{{route('advertisement.index')}}" class="navbar-brand">Advertisements</a>
@endsection
@section('content')

<div class="container-fluid mt-4 ">
    <div class="card form-me ml-auto mr-auto">
        <div class="card-header card-header-primary">
            <h4 class="card-title">New Advertisement</h4>
            <p class="card-category">Create New Advertisement</p>
        </div>
        <div class="card-body">
            <form action="{{route('advertisement.update',$ad->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- title --}}
                <div class="form-group mt-2">
                    <label class="bmd-label-floating">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$ad->title}}">
                </div>
                {{-- content --}}
                <div class="form-group mt-2">
                    <label class="bmd-label-floating">Content</label>
                    <textarea  name="content" class="form-control" cols="30" rows="10">{{$ad->content}}</textarea>
                </div>

                <div class="custom-file mt-2">
                    <input type="file" class="custom-file-input" name="upload_photo">
                    <label class="custom-file-label" for="customFile">Chosses file</label>
                </div>
                <button type="submit" class="btn btn-primary pull-right mt-2 float-right">Edit Advertisement</button>
            </form>
        </div>
    </div>
</div>
@endsection
