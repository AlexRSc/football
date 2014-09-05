@extends('layout.layout')
@section('content')
@if ((Auth::check())&&(Auth::user()->status=='freigeschaltet'))
    <h1>   .  </h1>
    <h1 style='max-height:300px'> This is the "Forum"! </h1>

{{ Form::open(array('url' => action("NewsController@save"), 'method' => 'POST')) }}



<p>{{ Form::label('title', 'Title') }}</p>
{{ $errors->first('title', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::text('title', NULL, array('placeholder' => 'Title')) }}</p>


<p>{{ Form::label('content', 'Content') }}</p>
{{ $errors->first('content', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::textarea('content', NULL, array('placeholder' => 'Password'),['size' => '30x4']) }}</p>


{{ Form::hidden('back', URL::previous() ) }}
<div class="btn-group">{{ Form::submit('Save',['class' => 'btn btn-primary ']) }}
    </div>
{{ Form::close() }}    
    

@foreach ($news as $a)
<div>
    <h4>{{$a->title}}</h4>
    <!--img src="../../img/line.gif"-->
    <p>{{Str::words($a->content)}}</p>   

    <div class="row-fluid">
        <div class="span2 offset7">
    Date: {{$a->created_at}}
        </div>
        <div class="span2">
            Author: {{$a->author}}
        </div>
        @if(Auth::user()->id==$a->user_id||Auth::user()->admin)
        <div>
            {{link_to_action("NewsController@delete", 'Delete Message', array($a->id));}}
        </div>
        @endif
        </div>

</div>
@endforeach

@elseif ((Auth::check())&&(Auth::user()->status=='nicht-freigeschaltet'))
<h1>   .  </h1>
<h1> Waiting for Approval from Admin </h1>
@else
<h1>   .  </h1>
<div>
{{ Form::open(array('url' => 'register_action')) }}
    <h1 style='max-height:300px'> Welcome to the Registration Form! </h1>
        <p>{{Form::label('firstname','Firstname')}}</p>
        {{$errors->first('firstname', '<p class="alert alter-danger"><a class="close" data-dismiss="alert" href="#")>&times;</a></p>')}}
        <p>{{ Form::text('firstname')}}</p>
        
        <p>{{Form::label('surname','Surname')}}</p>
        {{$errors->first('surname', '<p class="alert alter-danger"><a class="close" data-dismiss="alert" href="#")>&times;</a></p>')}}
        <p>{{ Form::text('surname')}}</p>
        
        <p>{{Form::label('user','Username')}}</p>
        {{$errors->first('user', '<p class="alert alter-danger"><a class="close" data-dismiss="alert" href="#")>&times;</a></p>')}}
        <p>{{ Form::text('user')}}</p>
        
        <p>{{Form::label('email','Email Address')}}</p>
        {{$errors->first('email', '<p class="alert alter-danger"><a class="close" data-dismiss="alert" href="#")>&times;</a></p>')}}
        <p>{{ Form::text('email')}}</p>
 
        <p>{{Form::label('password','Password')}}</p>
        {{$errors->first('password', '<p class="alert alter-danger"><a class="close" data-dismiss="alert" href="#")>&times;</a></p>')}}
        <p>{{ Form::password('password') }}</p>
 
        <p>{{Form::label('cpassword','Confirm your Password')}}</p>
        {{$errors->first('cpassword', '<p class="alert alter-danger"><a class="close" data-dismiss="alert" href="#")>&times;</a></p>')}}
        <p>{{ Form::password('cpassword') }}</p>
        
        <p>{{ Form::submit('Register!') }}</p>
    {{ Form::close() }}
 
    @endif
@stop    