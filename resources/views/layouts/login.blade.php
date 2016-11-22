<html>
<head>
	<title>Bideshi Job | @yield('title') </title>
	<link rel="stylesheet" href="{{asset('css/materialize.css')}}">
	<script src="{{asset('js/jquery-3.1.0.js')}}"></script>
	<script src="{{asset('js/materialize.js')}}"></script>
</head>
<body>

	<div id="app">
    
    <header class="header">
      <div class="logo-div">
			<nav>
			  <div class="nav-wrapper container">
			      <a href="/"class=" center"><img src="{{asset('images/logo.png')}}" alt="" class="brand-logo" style="height:65px"></a>		    
			  </div>
			</nav>
		</div>
	</header>	
	<div class="container">
		@yield('content')	
	</div>	
		<div class="footer">
			
		</div>
	</div>
</body>
</html>