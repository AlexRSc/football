@extends('layout.layout')
@section('content')
<div class="span11">
    <table class="table table-bordered">
    <thead><tr>
            <th>Week Name</th>
            <th>Start</th>
            <th>Tipp Deadline</th>
            <th>Tipps submitted</th>
            <th>Jackpot</th>
            <th>Action</th>
            @if(Auth::check() && Auth::user()->admin)
            <th>Admin Action</th>
            @endif
            <th>State</th>
            <th>Winner</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($game as $a)
        @if ($a->status!='nicht-freigeschaltet'||(Auth::check() && Auth::user()->admin))
        <tr>
    <td>@if (Auth::check() && Auth::user()->admin)
        {{link_to_action('GameController@save_edit', 
                    $a->week_name, array($a->id));}}
        @else
        {{$a->week_name}}
        @endif
    </td>
    <td>{{$a->period_start}}</td>
    <td>{{$a->period_end}}</td>
    <td>{{$a->counter}}</td>
    <td>{{$a->jackpot}}</td>
       <td>@if($a->status=='freigeschaltet')
        {{link_to_action('TippController@submit', 
                    'Tipp!', array($a->id));}}
           @endif
           @if($a->status=='deadline-over'||$a->status=='results')
        {{link_to_action('TippController@show', 
                    'Show all Tipps', array($a->id));}}     
           @endif
           @if($a->status=='results')
        {{link_to_action('DayController@results', 'Show Ranking',
                array($a->id));}}   
           @endif
       </td>
        @if (Auth::check() && Auth::user()->admin)

    <td>
        {{link_to_action('DayController@create', 'Gameplan', array($a->id));}}
        @if($a->status=='nicht-freigeschaltet')
        {{link_to_action('GameController@delete', 'Delete', array($a->id), 
            array("onklick"=>"return confirm('Are you sure you want to delete it?')"));}}
        @endif
    </td>
    @endif
    <td>{{$a->status}}
        @if (Auth::check() && Auth::user()->admin)
        @if($a->status=='freigeschaltet'||$a->status=='nicht-freigeschaltet')
        {{link_to_action('GameController@status', 'Change state', array($a->id));}}
        @endif
        @endif
    </td>
    <td>{{$a->Winner}}</td>
        
        </tr>
        
        @endif
    @endforeach
    </tbody>
            </table>
            @if (Auth::check() && Auth::user()->admin)

            {{link_to_action('GameController@create', 'Create Week', array(),
            array("class"=>"btn btn-large btn-primary"));}}
            @endif
</div>
@stop
