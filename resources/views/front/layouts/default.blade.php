<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('front.includes.head')
		@yield('css')
		<title>@yield('title')</title>
		
	</head>
	<body>
		@include('front.includes.header')
			@yield('content')
		@include('front.includes.footer')
		@yield('script_variables')
		@yield('scripts')	
		@include('front.includes.footer_js')
	</body>
</html>