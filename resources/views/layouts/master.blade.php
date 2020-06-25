<!DOCTYPE html>
<html>
<head>
	<title>Shopperzarena-an Ecommerce Website</title>
	@include('partials.styles')
</head>
<body>
	<div class="wrapper">
		@include('partials.nav')
		@yield('content')
		@include('partials.footer')
	</div>
	@include('partials.scripts')
</body>
</html>