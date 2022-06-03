<?php include("../php/auth.php"); ?>

<!doctype html>
<html lang="en">
 
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="googlebot" content="noindex, noarchive, nofollow, nosnippet">
	<meta name="robots" content="noindex, noarchive, nofollow">
	<meta name="slurp" content="noindex, noarchive, nofollow, noodp, noydir">
	<meta name="msnbot" content="noindex, noarchive, nofollow, noodp">
	
	<title>Portal</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/jpg" href="../img/favicon.ico">

	<!-- jQuery 3.x -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>	
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
	

	</head>

	<BODY>
	



	<nav class='navbar navbar-expand-lg navbar-light bg-light'>
				
		  <a class="navbar-brand" href="#">Notes</a>

		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="index.php">Home</a>
			  </li>
			  

	
			  <li class="nav-item">
				<a class="nav-link" href="#"><i class="fas fa-cogs"></i> Link</a>
			  </li>
			
			
	
			
			</ul>
			
				
				<button type="button" class="btn btn-secondary and-all-other-classes"> 
				  <a href="login.php?action=logout" style="color:inherit"><i class="fas fa-sign-out-alt"></i> Logout</a>
				</button>

		  </div>
		</nav>
		
		<br>
		
	<main role="main" class="container">
	
	
	<h1 style = "color:darkgreen;">Success!</h2>
	
	<p>You are now logged in
	Remember to include ../php/auth.php on every page users need to be logged in to view.</p>
	
	</main>


		
	<footer class="footer">
      <div class="container">
        <span class="text-muted">&copy; Author</span>
      </div>
    </footer>



</body>

</html>