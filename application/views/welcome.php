<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title;?></title>

	<!-- Set the viewport width to device width for mobile -->
 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 	<meta name="description" content="Document Management System for the engineering departments of the 7 atlantic universities." />
  	<meta name="author" content="Dalhousie Engineering Department" />
  	<meta name="copyright" content="Maavis, Group. Copyright (c) 2012" />

  	<!-- Included CSS Files -->
	<link rel="stylesheet" href="./stylesheets/foundation.css">
  	<link rel="stylesheet" href="./stylesheets/ie.css">
	<link rel="stylesheet" href="./stylesheets/app.css">

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<div class="container" id="login">
	<div class="row">
		<div class="six columns centered info">  
			<h2>DalDMS</h2>  
			<h6>Document Management System</h6>
			<div class="row">
  				<div class="twelve columns">
    				<div class="row collapse">
      					<div class="three mobile-one columns">
        					<span class="prefix">Username</span>
      					</div>
      					<div class="nine mobile-three columns">
        					<input type="text" />
      					</div>
    				</div>
  				</div>
			</div>

			<div class="row">
  				<div class="twelve columns">
    				<div class="row collapse">
      					<div class="three mobile-one columns">
        					<span class="prefix">Password</span>
      					</div>
      					<div class="nine mobile-three columns">
        					<input type="text" />
      					</div>
    				</div>
  				</div>
			</div>
  			<a href="#" class="small button">Login</a>
  			<a href="#" class="small secondary button">Forgot Password?</a>
		</div>
	</div>
</div>
</body>
</html>