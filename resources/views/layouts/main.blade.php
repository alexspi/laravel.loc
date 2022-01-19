<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','') | 8UGLOV - </title>

    @include('include.head')

</head>
<body id="app" >
<div id="page" class="hfeed site">
    	<!-- initiate header-->
    	@include('include.header')
	<div id="main" class="site-main">

		<div id="primary" class="content-area">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>

	    	<!-- initiate footer section-->
	    	@include('include.footer')

    	</div>
    </div>

	<!-- initiate scripts-->
	@include('include.script')
    <!-- Scripts -->

</body>
</html>
