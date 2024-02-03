@extends('layouts.app')

@section('content')

    <h1>Edit Competition</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\CompetitionsController@update', $comp->name, $comp->year], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name', $comp->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('year','Year')}}
            {{Form::number('year', $comp->year, ['class' => 'form-control', 'placeholder' => '2024', 'min' => 2000, 'max' => 2024])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description', $comp->description,['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/competitions/{{$comp->name}}/{{$comp->year}}" class="btn btn-secondary">Go Back</a>
    {!! Form::close() !!}
@endsection
