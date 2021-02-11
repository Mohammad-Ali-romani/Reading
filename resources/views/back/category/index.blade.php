@extends('back.layouts.master')
@section('title','Dashboard | Category')
@section('category','active')
@section('title_content')
    <a href="{{route('category.index')}}" class="navbar-brand">Category</a>
@endsection
@section('content')
<div class="container-fluid mt-4 ">
        <div class="bg-light p-1 text-left box-tool">
                <form action="{{route('category.store')}}" method="post" class="mb-0 row" >
                    @csrf
                    <div class="ml-5 mt-1 form-group ">
                        <input name="name" type="text" class="form-control input-me" placeholder="Name Category">
                    </div>
                    <button class="btn btn-primary ml-4">Add</button>
                </form>
        </div>

        <main class="card text-left" >
            <div class='table-responsive'>
                <table class="table">
                    <thead class="bg-primary">
                        <tr>
                            <th class="pl-3">Name</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categorys as $category)
                    <tr>
                        <td class="pl-4">
                            @if ($category)

                            @else

                            @endif
                            {{$category->name}}
                        </td>
                        <td class="text-center" ><a href="{{route('category.edit',$category->id)}}"><i class="fa fa-edit" style="font-size: 16px"></i></a></td>
                        <td class="text-center"  >
                            <form action="{{route('category.destroy',$category->id)}}" method="post">
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
