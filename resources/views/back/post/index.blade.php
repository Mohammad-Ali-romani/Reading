@extends('back.layouts.master')
@section('title','Dashboard | Post')
@section('post','active')
@section('title_content')
    <a href="{{route('post.index')}}" class="navbar-brand">Posts</a>
@endsection
@section('content')
<div class="container-fluid mt-4 ">
        <div class="bg-light p-1 text-left box-tool">
            <a href="{{route('post.create')}}" class="btn btn-primary">Create New post</a>
        </div>
        <main class="card text-left" >
            <div class='table-responsive'>
                <table class="table">
                    <thead class="bg-primary">
                        <tr>
                            <th class="pl-3">Photo</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="pl-4">
                            @isset($post->photo)
                            <a href="{{asset($post->photo)}}"><img src="{{asset($post->photo)}}" width="30"></a>
                            @else
                            <a href="{{asset("img/default.jpg")}}"><img src="{{asset("img/default.jpg")}}" width="30"></a>
                            @endisset
                        </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->category->name}}</td>
                        <td class="text-center" ><a href="{{route('post.edit',$post->id)}}"><i class="fa fa-edit" style="font-size: 16px"></i></a></td>
                        <td class="text-center"  >
                            <form action="{{route('post.destroy',$post->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn-delete text-danger"><i class="fas fa-times delete-icon" style="font-size: 16px"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </form>
</div>
@endsection
