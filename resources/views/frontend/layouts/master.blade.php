<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Shopperzarena-An Ecommerce Website')</title>
	
	@include('frontend.partials.styles')
</head>
<body>
	<div class="wrapper">
		@include('frontend.partials.nav')
		@include('frontend.partials.messages')
		@yield('content')
		@include('frontend.partials.footer')
	</div>
	@include('frontend.partials.scripts')
	@yield('scripts')
</body>
</html>
