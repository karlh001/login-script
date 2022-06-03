<?php

error_reporting(0);
include("cnx.php");



// get POST
	$fname = strip_tags($_POST["fname"]);
	$lname = strip_tags($_POST["lname"]);
	$email = strip_tags($_POST["email"]);
	$user = strip_tags($_POST["user"]);
	$password = strip_tags($_POST["password"]);
	$password2 = strip_tags($_POST["password2"]);


	if ( $fname == FALSE ) {
		echo "Please give your name";
		exit();
	} 
	
	if ( $user == FALSE ) {
		echo "Please choose a username";
		exit();
	} 
	
	if ( $lname == FALSE ) {
		echo "Please give your name";
		exit();
	} 

	if(strlen($fname) <= 1) {
		echo "Names much be great than one character";
		exit();			
	}
	
	if(strlen($user) <= 4) {
		echo "Username much be great than four character";
		exit();			
	}
	
	if(strlen($user) >= 20) {
		echo "Username cannot be more than 20 character";
		exit();			
	}
	
	if(strlen($lname) <= 1) {
		echo "Names much be great than one character";
		exit();			
	}

	if(strlen($fname) >= 40) {
		echo "Account names must be less than 40 characters";
		exit();			
	}

	if ( $email == FALSE ) {
		echo "Sorry we need your email. We do not spam, promise.";
		exit();
	} 

	if(strlen($password) < 8) {
		echo "Strong passwords help to protect your account
		Please create a password greater than 8.
		For the best secruity, please use letters, symbols and number.
		Password managers are best!";
		exit();
	} 
	
	if ( $password !== $password2) {
		echo "Passwords do not match";
		exit();
	} 
	
	
	// Special characters checks
	if (preg_match('/[\'^£$%&*,;:()}{@#~?><>,|=_+¬]/', $lname))
	{
		echo "Names cannot contain special symbols";
		exit();
	}
	
		if (preg_match('/[\'^£$,:;%&*()}{@#~?><>,|=_+¬]/', $fname))
	{
		echo "Names cannot contain special symbols";
		exit();
	}
	
		if (preg_match('/[\'^£$%&,:;*()}{@#~?><>,|=_+¬-]/', $user))
	{
		echo "Account type cannot contain special symbols";
		exit();
	}


	// Check if already run in last 1 min
	//sleep for 3 seconds
	//sleep(3);

	// Hash the password
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	// Create email confirmation code
	include("random-string.php");
	$code = rand_string( $Randomlength );
	
	// Have a go at inserting user with code
	$sql = "
	INSERT INTO `tbl_users` (`user_firstname`, `user_surname`, `user_name`, `user_pass`, `user_email`, `user_activation-code`)
	VALUES ('$fname', '$lname', '$user', '$password_hash', '$email', '$code');
	";
	
		// Checks insertion has worked

		if ($cnx->query($sql) === FALSE) {

		echo "Oh-no, username or e-mail is already in use";
		exit();
 
		} else {
		
		// Success
		$UserID = $cnx->insert_id;

		

		}			

	mysqli_free_result($cnx);

	
	// Success, tell AJAX the exciting news
	echo "1";
	exit();
?>
