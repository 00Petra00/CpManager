@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    @if(count($users) > 0)
    <div class="container text-center">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="/users/{{$user->id}}/assigns" class="btn btn-primary table-btn">Assigns</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
        <p>No users found</p>
    @endif
@endsection

