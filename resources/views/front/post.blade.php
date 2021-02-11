{{-- صفحة لمقال واحد يوجد فيها جميع البيانات بشكل مفصل مع كامل التعليقات --}}
@extends('front.layouts.master')
@section('title')
Reading >> {{$post->category->name}} | {{$post->title}}
@endsection
@section('description',"Wellcome to Reading")
@section('content')
<div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

    <!-- Title -->
    <h1 class="mt-4 text-dark">{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{$post->category->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on <span class="text-muted">{{$post->created_at}}</span></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{asset($post->photo)}}" alt="">
    <hr>
    <!-- Post Content -->
    <p class="lead">{{$post->content}}</p>
    <hr>
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form action="{{route('comment.save',$post->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input name="name" class="form-control" type="text" placeholder="Name">
                </div>
                <div class="form-group">
                    <input name="email" class="form-control" type="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <textarea name="comment" class="form-control" rows="4" placeholder="Comment ..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @forelse ($post->comments as $comment)
    <!-- Single Comment -->
    <div class="media mb-4">
        <h1><span class="text-muted mr-2"><i class="fa fa-user-circle"></i></h1>
        </span>
        <div class="media-body">
            <h5 class="mt-0">{{$comment->name}}</h5>
            <p>{{$comment->comment}}</p>
        </div>
    </div>
    @empty
    <div class="card-footer text-muted mb-5">
        <i class="fas fa-comment-slash"></i> There are no comments in this article
    </div>
    @endforelse
    {{-- {{$post->links()}} --}}



    <!-- Comment with nested comments -->
    {{-- <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

        </div>
    </div> --}}

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
        @include('front.layouts.sidebar')
    </div>

</div>
<!-- /.row -->
@endsection
