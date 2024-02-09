@extends('layouts.app')

@section('content')
    <h1 class="tit">Competitors</h1>
    @if(count($comps) > 0)
    <div id="messageBox"></div>
    <div class="container text-center">
        <table class="table table-striped">
            <thead class=" thead-bg">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Competition</th>
                    <th>Year</th>
                    <th>Round</th>
                    <th></th>
                </tr>
            </thead>
            @foreach($comps as $comp)
            <tr id="uid{{$comp->user_id}}{{$comp->round_id}}">
                <td>{{$comp->name}}</td>
                <td>{{$comp->email}}</td>
                <td>{{$comp->competition_name}}</td>
                <td>{{$comp->competition_year}}</td>
                <td>{{$comp->round}}</td>
                <td>
                {!! Form::open([ 'url' => ['competitors', $comp->user_id, $comp->round_id], 'method' => 'POST','id' => 'myForm']) !!}
                     {{Form::hidden('_method', 'DELETE')}}
                     {{-- {{Form::button('Remove', ['class' => 'btn btn-danger my-resp-btn-big', 'id' => 'submitBtn'])}}
                     {{Form::button('X', ['class' => 'btn btn-danger my-resp-btn-small'])}} --}}
                     <a href="javascript:void(0)" onclick="deleteCompetitor({{$comp->user_id}}, {{$comp->round_id}})" class="btn btn-danger my-resp-btn-big">Remove</a>
                     <a href="javascript:void(0)" onclick="deleteCompetitor({{$comp->user_id}}, {{$comp->round_id}})" class="btn btn-danger my-resp-btn-small">X</a>
                {!! Form::close() !!}
                </td>

            </tr>
            @endforeach
        </table>
    </div>

    <script>
        function deleteCompetitor(user_id, round_id)
        {
            if(confirm("Are you sure you want to delete this record?"))
            {
                $.ajax({
                    url: '/competitors/'+ user_id +'/' + round_id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#uid"+user_id+round_id).remove();
                        $("#messageBox").addClass('alert').addClass('alert-success').text("Record deleted successfully!");
                    }
                })
            }
        }
    </script>


    @else
        <p>No competitors found</p>
    @endif
@endsection

