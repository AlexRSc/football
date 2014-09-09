@extends('layout.layout')
@section('content')
{{ Form::open(array('url' => action("UserController@index"),'method' => 'GET')) }}
<div class="span11">
<table class="table table-bordered">
        <thead><tr>
                <th>User</th>
                <th>Correct Tipps</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=30; $i>=0; $i--)
            @foreach ($user as $a)
            @if(sizeOf(Tipp::where('user_id', $a->id)->where('evaluation', 1)->get())==$i)
            <tr>
                <td>{{$a->username}}</td>
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