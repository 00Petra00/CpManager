@extends('layouts.app')

@section('content')
<div class="text-center profile" >
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profile</h3>
      </div>
    <div class="card-body">

        <h4 class="card-subtitle mb-2 text-muted">{{$user->name}}</h4>
        <p>{{$user->email}}</p>
        <p><a href="/users/{{$user->id}}/edit" class="btn btn-secondary ">Change Password</a></p>
    </div>
</div>
</div>
@endsection
