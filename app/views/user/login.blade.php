@extends('layout.layout')
@section('content')
@if ((Auth::check())&&(Auth::user()->status=='freigeschaltet'))
    <h1>   .  </h1>
    <h1 style='max-height:300px'> This is the "Forum"! </h1>

{{ Form::open(array('url' => action("NewsController@save"), 'method' => 'POST')) }}



<p>{{ Form::label('title', 'Title') }}</p>
{{ $errors->first('title', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::text('title') }}</p>


<p>{{ Form::label('content', 'Content') }}</p>
{{ $errors->first('content', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::textarea('content', null, ['size' => '30x4']) }}</p>


{{ Form::hidden('back', URL::previous() ) }}
<div class="btn-group">{{ Form::submit('Save',['class' => 'btn btn-primary ']) }}
    </div>
{{ Form::close() }}    
    
@if(sizeOf($news)!=0)    
@for ($i=sizeOf($news)-1; $i>sizeOf($news)-20;$i--)
@if($i>0)
<div>
    <h4>{{$news[$i]->title}}</h4>
    <!--img src="../../img/line.gif"-->
    <p>{{Str::words($news[$i]->content);}}</p>

    <div class="row-fluid">
        <div class="span2 offset7">
    Date: {{$news[$i]->created_at}}
        </div>
        <div class="span2">
            Author: {{$news[$i]->author}}
        </div>
        @if(Auth::user()->id==$news[$i]->user_id||Auth::user()->admin)
        <div>
            {{link_to_action("NewsController@delete", 'Delete Message', array($news[$i]->id));}}
        </div>
        @endif
        </div>
<hr>
</div>
@endif
@endfor
@endif
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