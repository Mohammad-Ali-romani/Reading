{{-- صفحة تحوي عدت مقالات بحسب تصنيفها --}}
@extends('front.layouts.master')
@section('title')
Reading >> {{$category->name}}
@endsection
@section('description',"Wellcome to Reading")
@section('category.'.$category->id,'active')
@section('content')
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

    <h1 class="my-4 text-dark">Category :
        <small class="text-secondary">{{$category->name}}</small>
    </h1>
    @forelse ($category->posts as $post)
        <!-- Blog Post -->
    <div class="card mb-4">
        <img class="card-img-top" src="{{$post->photo}}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{$post->content}}</p>
            <a href="{{route('post.show.one',['category_id'=>$post->category_id,'id'=>$post->id])}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on {{$post->created_at}} by
            {{-- <a href="#">Start Bootstrap</a> --}}
        </div>
    </div>
    @empty

    @endforelse
    @foreach ($posts as $post)
    <div>{{$post->name}}</div>
    @endforeach

    <!-- Pagination -->
    {{-- {{$posts->links()}} --}}

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
        @include('front.layouts.sidebar')
    </div>

</div>
@endsection
