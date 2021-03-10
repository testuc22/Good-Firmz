<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('admin.includes.head')
	@yield('css')
	<title>@yield('title')</title>
	
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		@include('admin.includes.header')
		@include('admin.includes.sidebar')
		<div class="content-wrapper">
			@yield('content')
		</div>
		@include('admin.includes.footer')
	</div>
	@include('admin.includes.footer_js')
	@yield('scripts')
	@stack('head')
</body>
</html>