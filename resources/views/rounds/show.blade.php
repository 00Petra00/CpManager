@extends('layouts.app')

@section('content')
    <a href="/competitions/{{$round->competition_name}}/{{$round->competition_year}}" class="btn btn-secondary">Go Back</a>
    <div class="center">
        <h1>{{$round->round}}</h1>
        <p>{{$round->description}}</p>
        <p>Application deadline {{$round->deadline}}</p>
        <div  aria-label="Basic example">
            @if (!Auth::guest())
                @if (auth()->user()->name === 'admin' && auth()->user()->email === 'admin@admin.com')
                    {!! Form::open(['action' => ['App\Http\Controllers\RoundsController@destroy', $round->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <a href="{{$round->id}}/edit" class="btn btn-secondary">Edit</a>
                        {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this round?')"])}}
                    {!! Form::close() !!}

                @endif
            @endif
        </div>
    </div>
@endsection
