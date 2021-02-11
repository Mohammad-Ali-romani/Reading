@extends('back.layouts.master')
@section('title','Dashboard | Create Post')
@section('post','active')
@section('title_content')
    <a href="{{route('post.index')}}" class="navbar-brand">Posts</a>
@endsection
@section('content')

<div class="card form-me ml-auto mr-auto">

    <div class="card-header card-header-primary">
        <h4 class="card-title">New post</h4>
        <p class="card-category">Create New post</p>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            {{-- title --}}
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Title</label>
                <input name="title" type="text" class="form-control" value="{{old('title')}}">
            </div>
            {{-- content --}}
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Content</label>
                <textarea name="content"  cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
            </div>
            {{-- category --}}
            <div class="form-group">
                <label >Category</label>
                <select name="category_id" class="form-control">
                    @forelse ($categorys as $category)
                        <option class="bg-light" value="{{$category->id}}" @checked(old('category_id'),$category->id) {{"selected"}}    @endchecked>{{$category->name}}</option>
                    @empty
                        <option disabled checked>There are no categorys</option>
                    @endforelse
                </select>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="upload_photo">
                <label class="custom-file-label" for="customFile">Chosses file</label>
            </div>
            {{-- button submit --}}
            <button type="submit" class="btn btn-primary pull-right mt-2 float-right">Add Post</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
@endsection
