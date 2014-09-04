<!DOCTYPE HTML>
<html lang="en-GB">
<head>
 <meta charset="UTF-8">
 <title>AF-Predictor</title>
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::script('js/jquery-1.10.2.js') }}
{{ HTML::script('js/jquery.dataTables.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ HTML::script('js/jquery.sheepItPlugin-1.1.1.min.js') }}
{{ HTML::script('js/jquery.dumbformstate-1.0.1.js') }}
</head>
<body>
<div class="navbar navbar-fixed-top" ng-app="football.app">
    <div class="navbar-inner">
        {{link_to_action('UserController@index', 'Football-App',array(),array("class"=>"brand"));}}
        <ul class="nav">
            @if (Auth::check() && Auth::user()->admin)
            <li>{{link_to_action('UserController@edit', 'User-Administration');}}</li>
            @endif
            @if (Auth::check()&&(Auth::user()->status!='nicht-freigeschaltet'))
            <li>{{link_to_action('GameController@lists', 'Season Weeks');}}</li>
            @endif
      </ul>
        @include('user.bar')
    </div>
</div>
	<div class="row-fluid">
		<div class="span10 offset1">
		    @if ( Session::has('messages') )
                <div class="alert alert-info">
                     @foreach (Session::get('messages') as $message)
                        <p>{{$message}}</p>
                     @endforeach
                </div>
            @endif
			@yield('content')
		</div>
	</div>
</body>
</html>

