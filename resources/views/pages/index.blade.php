@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="title">Hi, welcome to CpManager!</h1>
        <p class="title-p"> Manage your competitions!</p>
        @if (!Auth::guest())
        @if (auth()->user()->name === 'admin' && auth()->user()->email === 'admin@admin.com')
        <a class="btn btn-primary btn-lg" href="/competitions/create">Create Competitions</a>
        @else
        <a class="btn btn-primary btn-lg" href="/competitions">Find Competitions</a>
        @endif
        @else
        <a class="btn btn-primary btn-lg" href="/login">Login</a>
        <a class="btn btn-primary btn-lg" href="/register">Register</a>
        @endif
    </div>


@endsection

@section('img')
<div class="image-box">
    <a><img class="image" src="images/cpmanager.jpg"></a>
</div>
@endsection

