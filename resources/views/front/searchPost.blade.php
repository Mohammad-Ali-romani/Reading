{{-- صفحة تحوي عدت مقالات بحسب تصنيفها --}}
@extends('front.layouts.master')
@section('title')
Reading >> {{$value}}
@endsection
@section('description',"Wellcome to Reading")
@section('content')
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Search >> {{$value}}
            {{-- <small>Secondary Text</small> --}}
        </h1>
        @forelse ($posts as $post)
            @if ($post->title == $value)
                <!-- Blog Post -->
                <div class="card mb-4">
                    <img class="card-img-top" src="{{$post->photo}}" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{$post->title}}</h2>
                        <p class="card-text">{{$post->content}}</p>
                        <a href="{{route('post.show.one',['category_id'=>$post->category_id,'id'=>$post->id])}}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <span class="text-muted">{{$post->created_at}}</span> by
                        {{-- <a href="#">Start Bootstrap</a> --}}
                    </div>
                </div>
            @endif
        @empty
        <div>لا يوجد عناصر</div>
        @endforelse
        {{-- {{$posts->links()}} --}}
    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
        @include('front.layouts.sidebar')
    </div>

</div>
@endsection
