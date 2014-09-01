@extends('layout.layout')
@section('content')

<h1>   .  </h1>
@if(Auth::user()->admin)
<h1 style='max-height:300px'> Hier kannst du die Leute freischalten </h1>
<div class="span11">
    <table class="table table-bordered">
    <thead><tr>
            <th>Username</th>
            <th>Email Address</th>
            <th>Firstname</th>
            <th>Surname</th>
            <th>State</th>
            <th>Action</th>            
            </tr>
            </thead>
    <tbody>
        @foreach ($user as $a)
        <tr>
    <td>{{$a->username}}</td>
    <td>{{$a->email}}</td>
    <td>{{$a->firstname}}</td>
    <td>{{$a->surname}}</td>
    <td>{{$a->status}}</td>
    <td>
        @if(($a->status)=="freigeschaltet")
        {{link_to_action('UserController@lock', 
                    'Lock Account', array($a->id));}}
        @endif
        @if(($a->status)=="nicht-freigeschaltet")
        {{link_to_action('UserController@unlock', 
            'Unlock Account', array($a->id));}}
        @endif
    </td>
        </tr>
    @endforeach
    </tbody>
            </table>
            
</div>
@endif
@stop




