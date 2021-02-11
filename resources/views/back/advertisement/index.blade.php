@extends('back.layouts.master')
@section('title','Dashboard | advertisement')
@section('advertisement','active')
@section('title_content')
    <a href="{{route('advertisement.index')}}" class="navbar-brand">Advertisements</a>
@endsection
@section('content')
<div class="container-fluid mt-4 ">
    <div class="bg-light p-1 text-left box-tool">
        <a href="{{route('advertisement.create')}}" class="btn btn-primary">Add Advertisement</a>
    </div>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">advertisement</h4>
            <p class="card-category">You can add a new advertisement</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($advertisements as $advertisement)
                            <tr>
                                <td>
                                    <div class="box-img">
                                        <a href="{{asset($advertisement->photo)}}"><img src="{{asset($advertisement->photo)}}"></a>
                                    </div>
                                </td>
                                <td>{{$advertisement->title}}</td>
                                <td>{{$advertisement->content}}</td>
                                <td class="text-center"><a href="{{route('advertisement.edit',$advertisement->id)}}"><i class="fa fa-edit"></i></a></td>
                                <td class="text-center"  >
                                    <form action="{{route('advertisement.destroy',$advertisement->id)}}" method="post">
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
        </div>
    </div>
</div>
@endsection
