<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
	<title>@yield('title','laravel')-laravel 论坛</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<meta charset="utf-8" name="csrf-token"

	content="{{csrf-token()}}">
</head>
<body>

	<div id="app" class="{{route_class()}}-page">
		@include('layouts._header')
		
		<div class="container">
			@yield('content')
		</div>
		@include('layouts._footer')
	</div>
	<script type="text/javascript" src="{{asset('js/app.js')}"></script>
</body>
</html>