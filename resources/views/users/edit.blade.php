@extends('layouts.app')

@section('content')

    <h1>Change Password</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\UsersController@update', $user->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('old','Old Password')}}
            {{Form::text('old', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('new','New Password')}}
            {{Form::text('new', '', ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/users/{{$user->id}}" class="btn btn-secondary">Go Back</a>
    {!! Form::close() !!}
@endsection
