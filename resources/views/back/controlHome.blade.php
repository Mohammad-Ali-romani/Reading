@extends('back.layouts.master')
@section('title','Dashboard | Setting Home')
@section('settings','active')
@section('title_content')
    <a class="navbar-brand" href="{{route('home.index')}}">Setting Home</a>
@endsection
@section('content')
<div class="container">
    <div class="card form-me ml-auto mr-auto">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Setting Home</h4>
            <p class="card-category">change setting page home</p>
        </div>
        <div class="card-body">

        <form action="{{route("home.update",$home->id)}}" id="form" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="custom-file mb-4" style="height: 120px">
                <div class="box-img-lg">
                    <img src="{{asset($home->logo)}}" class="logo-img">
                    <span id="upload">
                        <span class="upload bg-muted fa fa-upload" ></span>
                    </span>
                </div>
                <input type="file" id="logo" style="display: none" name="logo">
            </div>
            <div class="form-group bmd-form-group mt-4">
                <label class="bmd-label-floating">Whatsapp</label>
                <input type="text" name="whatsapp" class="form-control" value="{{$home->whatsapp}}">
            </div>
            <div class="form-group bmd-form-group mt-4">
                <label class="bmd-label-floating">FaceBook</label>
                <input type="text" name="facebook" class="form-control" value="{{$home->facebook}}">
            </div>
            <div class="form-group bmd-form-group mt-4">
                <label class="bmd-label-floating">Instegram</label>
                <input type="text" name="instegram" class="form-control" value="{{$home->instegram}}">
            </div>
            <button class="btn btn-primary float-right mt-3">UpDate</button>
        </form>
        </div>
    </div>
</div>
@endsection
