@extends('layouts.app')

@section('content')
    <h1>Create Round</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\RoundsController@store', $comp->name, $comp->year], 'method' => 'POST']) !!}
        <div class="form-group ">
            {{Form::label('round','Round')}}
            <div>
            {{ Form::select('round', array('1st round' => '1st round', '2nd round' => '2nd round', '3rd round' => '3rd round', '4th round' => '4th round', '5th round' => '5th round', 'final round' => 'final round'), $default, ['class' => 'my-dropdown']) }}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description','',['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('deadline','Deadline')}}
            {{Form::date('deadline', date("Y-m-d"),['class' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/competitions/{{$comp->name}}/{{$comp->year}}" class="btn btn-secondary">Go Back</a>
    {!! Form::close() !!}
@endsection
