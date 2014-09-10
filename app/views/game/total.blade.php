@extends('layout.layout')
@section('content')
{{ Form::open(array('url' => action("UserController@index"),'method' => 'GET')) }}
<div class="span11">
    <h2>This shows the amount of correct tipps</h2>
<table class="table table-bordered">
        <thead><tr>
                <th>User</th>
                @foreach ($game as $a)
                <th>{{$a->week_name}}</th>
                @endforeach
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=30; $i>=0; $i--)
            @foreach ($user as $a)
            @if(sizeOf(Tipp::where('user_id', $a->id)->where('evaluation', 1)->get())==$i)
            <tr>
                <td>{{$a->username}}</td>
                @foreach($game as $b)
                <td>{{sizeOf(tipp::where('user_id', $a->id)->where('week_id', $b->id)
                            ->where('evaluation', 1)->get())}}</td>
                @endforeach
                    
                <td>{{$i}}</td>
            </tr>   
            @endif  
            @endforeach
            @endfor
            
        </tbody>
    </table>

{{ Form::hidden('back', URL::previous() ) }}
<div class="btn-group">
    {{ Form::submit('Back!!',['class' => 'btn btn-primary ']) }}
</div>
{{ Form::close() }}    
</div>

@stop