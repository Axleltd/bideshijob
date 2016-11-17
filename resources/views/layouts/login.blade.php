<html>
<head>
	<title>Bideshi Job | @yield('title') </title>
	<link rel="stylesheet" href="{{asset('css/materialize.css')}}">
	<script src="{{asset('js/jquery-3.1.0.js')}}"></script>
	<script src="{{asset('js/materialize.js')}}"></script>
</head>
<body>
	<div class="container">
		<nav>
		  <div class="nav-wrapper">
		    <a href="" class="brand-logo">Logo</a>		    
		  </div>
		</nav>			
		@yield('content')
		<div class="footer">
			
		</div>
	</div>
</body>
</html>