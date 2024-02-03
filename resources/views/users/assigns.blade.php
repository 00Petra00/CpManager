@extends('layouts.app')

@section('content')
    <h1>Current Competitions</h1>
    @if(count($results) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Round</th>
                    <th>Deadline</th>
                    <th></th>
                </tr>
            </thead>
            @foreach($results as $result)
            @if($result->deadline > $mytime)
            <tr>
                <td>{{$result->name}}</td>
                <td>{{$result->year}}</td>
                <td>{{$result->round}}</td>
                <td>{{$result->deadline}}</td>
                <td><a href="/users/{{$user}}/{{$result->id}}" class="btn btn-primary table-btn">Assigns</a></td>
            </tr>
            @endif
            @endforeach
        </table>
    @else
        <p>No competitons found</p>
    @endif
@endsection
