<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
	<title>@yield('title','laravel')-laravel 论坛</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	@yield('styles')
	<meta charset="utf-8"  http-equiv="x-UA-Compatible" content="IE=edge">
	<meta charset="utf-8"  name = "viewport" content="width=device-width,initial-scale=1" >
	<meta charset="utf-8" name="csrf-token" content="{{csrf_token()}}">
</head>
<body>

	<div id="app" class="{{route_class()}}-page">
		@include('layouts._header')
		
		<div class="container">
			@yield('content')
		</div>
		@include('layouts._footer')
	</div>
	 <script src="{{ asset('../js/app.js') }}"></script>
	 @yield('scripts')
</body>
</html>