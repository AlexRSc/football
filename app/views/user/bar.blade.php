
@if (Auth::check())
    <div style="float: right; margin-right: 8em; margin-top: 0.7em">
        {{link_to_action('UserController@logout', trans("Logout"), array(),
        array("class"=>"btn btn-primary", "style"=>"float: right;  margin-right: 1em"));
    }}
    <h4 style="float: right;  margin-right: 2em">{{Auth::user()->firstname}} {{Auth::user()->surname}}</h4>
    </div>
@else
    {{ Form::open(array('url' => action("UserController@login"), 'method' => 'POST')) }}
    <div style="float: right;  margin-right: 8em; margin-top: 0.7em">
    <input type="submit" name="login" value=Login class="btn btn-primary"/>
    </div>
    <div style="float: right;  margin-right: 9em; width: 8em; margin-top: 1em">
    {{ Form::password('password') }}
    {{ Form::hidden('back', URL::previous() ) }}
    </div>
    <div style="float: right; margin-right: 1em; margin-top: 1em">
    {{ Form::text('username') }}
    </div>
{{ Form::close() }}
@endif