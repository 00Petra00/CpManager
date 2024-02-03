@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                    <a class="btn btn-primary" href="/competitions/create">Create Competitions</a>
                    <h3>Competitions</h3>
                    @if (count($comps) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($comps as $comp)
                        <tr>
                            <td>{{$comp->name}}</td>
                            <td><a href="/competitions/{{$comp->name}}/{{$comp->year}}/edit" class="btn btn-default">Edit</a></td>
                            <td> {!! Form::open(['action' => ['App\Http\Controllers\CompetitionsController@destroy', $comp->name, $comp->year], 'method' => 'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You have not competitions</p>
                    @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
