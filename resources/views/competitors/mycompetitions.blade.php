@extends('layouts.app')

@section('content')
    <h1>My Competitions</h1>
    @if(count($comps) > 0)
    <div class="container text-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Competition</th>
                    <th>Year</th>
                    <th>Round</th>
                </tr>
            </thead>
            @foreach($comps as $comp)
            <tr>
                <td>{{$comp->competition_name}}</td>
                <td>{{$comp->competition_year}}</td>
                <td>{{$comp->round}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
        <p>No competitions found</p>
    @endif
@endsection
