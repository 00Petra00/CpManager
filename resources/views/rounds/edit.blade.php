@extends('layouts.app')

@section('content')
    <h1>Edit Round</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\RoundsController@update', $round->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('round','Round')}}
            {{Form::text('round', $round->round, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description', $round->description, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('deadline','Deadline')}}
            {{Form::date('deadline', $round->deadline, ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/rounds/{{$round->id}}" class="btn btn-secondary">Go Back</a>
    {!! Form::close() !!}

@endsection
