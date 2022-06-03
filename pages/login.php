<?php
ob_start( 'ob_gzhandler' ); // compresses webpage for speed
//error_reporting(0); # 0 turn off error reporting.


	$PageAction = $_GET["action"];

	if ($PageAction == "logout") {
		session_start();
		session_destroy();
	}
	
	if ($PageAction == "activate") {
		
		$ActCode = strip_tags($_GET["id"]);
		$Username = strip_tags($_GET["u"]);
		
		// Activate account
		
		// Completed activate enable banner
		$ActComplete = 1;
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<title>Log-in</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="googlebot" content="noindex, noarchive, nofollow, nosnippet">
	<meta name="robots" content="noindex, noarchive, nofollow">
	<meta name="slurp" content="noindex, noarchive, nofollow, noodp, noydir">
	<meta name="msnbot" content="noindex, noarchive, nofollow, noodp">

	<link rel="icon" href="../img/favicon.ico">
  
  
	<link rel="stylesheet" href="../css/login.css">
    
	
	<!-- jQuery 3.x -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>	
	
	<!-- Date/Time Plug-in -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  
	<link rel="shortcut icon" href="img/favicon.ico">  


</head>




<body class="d-flex flex-column h-100">



<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    

  <div class="container">

  
  
  <div id="SuccessAccount" class="alert alert-success" style="display:none;" role="alert">
	Welcome! You have successfully registered. Please check your email inbox to confirm your email address.
	</div>
  
		<?php
		
			if ( $ActComplete > 0 ) {
			
				echo "
			<div class='alert alert-primary'>
                <strong>This is great news!</strong> Thank you for registering and activating your account.<br>
				We're happy to have you aboard. Please log-in.
            </div>
	
				";
			
			}
		
		?>

	  
        <div class="card card-container">
			
			<h2>Weclome</h2>
			<br>

			<div id="errorMsg" class="alert alert-danger" style="display: none;">
                <strong>Error!</strong> Username or password was incorrect. Please try again.
            </div>
	
			
            <form id="loginForm" class="form-signin">
				
                <span id="reauth-email" class="reauth-email"></span>
                
                <input type="username" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                
				<br>
				
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
				
                <div id="remember" class="checkbox">
                    <!--<label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>-->
                </div>
				
                <input id = "loginBtn" type = "submit" class="btn btn-lg btn-primary btn-block btn-signin" value="Log-in">
            
			</form>
			
			<br>
			<hr>
			
            <a href="#NewUserModal" data-toggle="modal" data-target="#NewUserModal">
                Create an account
            </a>
			<br>
			<a href="#">
                Forgotten password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container div -->
	

	
	
	<!-- Create a new account -->

	<div class="modal" id="NewUserModal">
	  <div class="modal-dialog">
		<div class="modal-content">

		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fas fa-user-plus"></i> Create a new account ...</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>

		  <!-- Modal body -->
		  <div class="modal-body">
		  <form id="NewUserForm">
			Thanks for joining. We're excited to have you aboard. We just need a few details first
				<br>
				<span class = "errorMsg" style="color: red;"></span>
				<br><br>
				
			 <div class="form-group row">
				<label for="fname" class="col-4 col-form-label">Firstname</label> 
				<div class="col-8">
				  <div class="input-group">
					<div class="input-group-prepend">
					  <div class="input-group-text">
						<i class="far fa-user"></i>
					  </div>
					</div> 
					<input id="fname" name="fname" type="text" required="required" class="form-control">
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="lname" class="col-4 col-form-label">Lastname</label> 
				<div class="col-8">
				  <div class="input-group">
					<div class="input-group-prepend">
					  <div class="input-group-text">
						<i class="fas fa-user"></i>
					  </div>
					</div> 
					<input id="lname" name="lname" type="text" required="required" class="form-control">
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="email" class="col-4 col-form-label">Email</label> 
				<div class="col-8">
				  <div class="input-group">
					<div class="input-group-prepend">
					  <div class="input-group-text">
						<i class="fas fa-at"></i>
					  </div>
					</div> 
					<input id="email" name="email" type="text" required="required" class="form-control">
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="user" class="col-4 col-form-label">Username</label> 
				<div class="col-8">
				  <div class="input-group">
					<div class="input-group-prepend">
					  <div class="input-group-text">
						<i class="fa fa-user"></i>
					  </div>
					</div> 
					<input id="user" name="user" type="text" required="required" class="form-control">
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="password" class="col-4 col-form-label">Password</label> 
				<div class="col-8">
				  <div class="input-group">
					<div class="input-group-prepend">
					  <div class="input-group-text">
						<i class="fa fa-key"></i>
					  </div>
					</div> 
					<input id="password" name="password" type="password" required="required" class="form-control">
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="password2" class="col-4 col-form-label">Confirm</label> 
				<div class="col-8">
				  <div class="input-group">
					<div class="input-group-prepend">
					  <div class="input-group-text">
						<i class="fa fa-key"></i>
					  </div>
					</div> 
					<input id="password2" name="password2" type="password" required="required" class="form-control">
				  </div>
				</div>
			  </div>

			  <div class="form-group row">
				<div class="col-8">

					<textarea id="tcs" name="tcs" rows="4" cols="50" readonly	>Terms and conditions should be placed here for the users to agree too prior to creating account.</textarea>

				</div>
			  </div>

			 
			  <div class="form-group row">
				<label class="col-4"></label> 
				<div class="col-8">
				  <div class="custom-control custom-checkbox custom-control-inline">
					<input name="checkbox" id="checkbox_0" type="checkbox" class="custom-control-input" value="1"> 
					<label for="checkbox_0" class="custom-control-label">I have read and agree to the above terms and conditions</label>
				  </div>
				</div>
			  </div>


			  <!-- Modal footer -->
			  <div class="modal-footer">
				<input type ="submit" value = "Create user" id = "CreateAccount" class="btn btn-primary">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			  </div>

					</form>
				</div>
			</div>
		</div>
	</div>
	

  </div>
</main>
  

		<footer class="footer mt-auto py-3">
		  <div class="container">
			<span class="text-muted">
				<hr>
				&copy; <?php echo date("Y"); ?> karlh001<br>
				
			
			</span>
		  </div>
		</footer>



	
		</body>
	
	
	<script src="../js/login-script.js"></script>
	<script src="../js/create_user.js"></script>
	

</html>
