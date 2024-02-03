@extends('layouts.app')

@section('content')
<div class="center">
    {{-- <a href="/competitions" class="btn btn-secondary">Go Back</a> --}}
    <h1>{{$comp->name}}</h1>
    <div class="my-p">
    <p>{{$comp->description}}</p>
    </div>
    {{-- <small>By {{$comp->user->name}}</small> --}}
    <div  aria-label="Basic example">
    @if (!Auth::guest())
        @if (auth()->user()->name === 'admin' && auth()->user()->email === 'admin@admin.com')


            {!! Form::open(['action' => ['App\Http\Controllers\CompetitionsController@destroy', $comp->name, $comp->year], 'method' => 'POST']) !!}
                <a href="{{$comp->year}}/edit" class="btn btn-secondary">Edit</a>
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
    </div>
</div>
        <div class="card text-center rounds" >
            <h5 class="card-header">Rounds</h5>
                <div class="card-body">
                    @if (!Auth::guest())
                      @if (auth()->user()->name === 'admin' && auth()->user()->email === 'admin@admin.com')
                        <a href="{{$comp->year}}/create" class="btn btn-primary">New Round</a>
                      @endif
                    @endif
                    @if(count($rounds) > 0)
                        @foreach($rounds as $round)
                            <div class="list-group my-hover">
                                <h3><a class="list-group-item" href="/rounds/{{$round->id}}">{{$round->round}}</a></h3>
                            </div>
                        @endforeach
                        {{-- {{$comps->links()}} --}}
                    @else
                        <p>No rounds found</p>
                    @endif
                </div>
        </div>

@endsection
