@extends('back.layouts.master')
@section('title','Dashboard | Comment')
@section('comment','active')
@section('title_content')
    <a class="navbar-brand" href="{{route('comment.index')}}">Comment</a>
@endsection
@section('content')
<div class="container-fluid mt-4 ">
    <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0"> Comments</h4>
            <p class="card-category"> this is the comment user</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Comment</th>
                       <th>Name Post</th>
                       <th>Delete</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->post->title}}</td>
                        <td class="text-center">
                            <form action="{{route('comment.destroy',$comment->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn-delete text-danger"><i class="fas fa-times delete-icon" style="font-size: 16px"></i></button>
                            </form>
                        </td>
                    </tr>
                   @endforeach

               </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
