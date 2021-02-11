@extends('back.layouts.master')
@section('title','Dashboard | Edit Post')
@section('dashboard','active')
@section('title_content')
    <a class="navbar-brand" href="{{route('home.index')}}">Dashboard</a>
@endsection
@section('livewireStyle')
    @livewireStyles
@endsection
@section('livewireScript')
    @livewireScripts
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
                @livewire('back.update-profile')
            </div>
        </div>
        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Password</h4>
            <p class="card-category">reset of the password</p>
            </div>
            <div class="card-body">
                @livewire('back.change-password')
            </div>
        </div>
    </div>
</div>

@endsection
