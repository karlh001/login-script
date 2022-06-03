<?php
session_start(); // starts the php session
session_regenerate_id(); // regenerates session key
error_reporting(0); # 0 turn off error reporting.



// connects to the user database
include("cnx.php");

// Check connection

	// Gets data
	$username = strip_tags($_POST["username"]);
	$password = strip_tags($_POST["password"]);
	// make username lowercase
	$username = strtolower($username);

	// Finds users IP address
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$IP = strip_tags($_SERVER['HTTP_CLIENT_IP']);
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$IP = strip_tags($_SERVER['HTTP_X_FORWARDED_FOR']);
	} else {
		$IP = strip_tags($_SERVER['REMOTE_ADDR']);
	}


	$_SESSION["ip"]= $IP;
	$_SESSION["browser-version"] = strip_tags($_SERVER['HTTP_USER_AGENT']);
	$browserVersion = strip_tags($_SERVER['HTTP_USER_AGENT']);


	$dateNow = date("Y-m-d H:i:s");
	
		
		$getuser = "
			SELECT * from tbl_users
			WHERE user_name = '$username'
		"; // Calls procedure

		$result = mysqli_query($cnx,$getuser) or die
		("Error: Couldn't access database to check usernames and passwords(!)");

		if ($result->num_rows > 0) {
					

			while ($row = mysqli_fetch_assoc($result)) {
			
				$usern = $row['user_name'];
				$hash = $row['user_pass'];
				$userID = $row['user_ID'];

				$_SESSION["UserID"] = $userID;
				$_SESSION["UserName"] = $usern;
			}


		} else {

			// User was not in the database
			session_destroy();
			echo "Sorry: Username or password was incorrect. Please try again.";
			exit();
		}


		mysqli_free_result($result);
		mysqli_next_result($cnx);

		// Compares the hashed password in the database with the
		// hashed password supplied by the user at login

		// Checks if $password and $hash is a string
		
		if (is_string($password) === False) {
			echo "Sorry: Username or password was incorrect. Please try again.";
			exit();
		}
		if (is_string($hash) === False) {
			echo "Sorry: Username or password was incorrect. Please try again.";
			exit();
		}



			if (password_verify($password, $hash)) {

				// Password was correct
				// Set cookie with unique ID
				
				include("random-string.php");
					
				$code = rand_string( 20 );
					
				$_SESSION["code"] = $code;
				$_SESSION["IP"] = $IP;
					
				setcookie("code", $code, time()+604800, '/'); 
						
				// Set access record
				$PostAccessSQL = "
				INSERT INTO `tbl_access` (`user_ID`, `access_IP`, `access_browser`)
				VALUES ('$userID', '$IP', '$browserVersion');
				";

				if ($cnx->query($PostAccessSQL) === TRUE) {
					// Record created allow log-in
					
					$_SESSION["AccessID"] = $cnx->insert_id;
					
					echo "1"; // Informs JS that user can successfully log-in
					$cnx->close();
					exit();
				} 

			

			}
			
			
		// Password was not correct
		// Fail attempt
							
		session_destroy();
		
		echo "Sorry: Username or password was incorrect. Please try again.";
		$cnx->close();
		exit();

?>
