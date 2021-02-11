@extends('back.layouts.master')
@section('title','Dashboard | Edit Post')
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
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- title --}}
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Title</label>
                <input name="title" type="text" class="form-control" value="{{$post->title}}">
            </div>
            {{-- content --}}
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Content</label>
                <textarea name="content"  cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
            </div>
            {{-- category --}}
            <div class="form-group">
                <label >Category</label>
                <select name="category_id" class="form-control" value="{{$post->category_id}}">
                    @forelse ($categorys as $category)
                        <option class="bg-light" value="{{$category->id}}">{{$category->name}}</option>
                    @empty
                        <option  disabled checked>There are no categorys</option>
                    @endforelse
                </select>
            </div>
            {{-- image --}}
            <label for="">Upload photo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="upload_image" value="{{$post->photo}}">
                <label class="custom-file-label" for="customFile">Chosses file</label>
            </div>
            {{-- button submit --}}
            <button type="submit" class="btn btn-primary pull-right mt-2 float-right">Edit Post</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
@endsection
