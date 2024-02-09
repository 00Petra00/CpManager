@extends('layouts.app')

@section('content')
    <h1>Create Competition</h1>
    <div class="create-form">
    {!! Form::open(['action' => 'App\Http\Controllers\CompetitionsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('year','Year')}}
            {{Form::number('year','',['class' => 'form-control', 'placeholder' => date("Y"), 'min' => date("Y"), 'max' => date("Y")+10])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description','',['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection
