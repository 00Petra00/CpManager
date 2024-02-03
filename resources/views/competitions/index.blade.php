@extends('layouts.app')

@section('content')

    <h1>Competitions</h1>
    <div class="margin">
    @if(count($comps) > 0)
        @foreach($comps as $comp)
            <div class="list-group my-box">
                <h4><a class="my-list" href="competitions/{{$comp->name}}/{{$comp->year}}" >{{$comp->name}} ({{$comp->year}})</a></h3>
            </div>
        @endforeach
    @else
        <p>No competitions found</p>
    @endif
    </div>
@endsection
