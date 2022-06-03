<?php

session_start();
session_regenerate_id();

// Auth page


	// Checks PHP session still active
	if ($_SESSION["UserID"] == FALSE) {
		
		session_destroy();
		
		echo "
		<script>
				window.location.href='login.php?msg=session-ended';
		</script>	
		";

		exit();
	}

	// Checks unique ID matches cookie from session
	if ($_SESSION["code"] != $_COOKIE["code"] ) {
		
		session_destroy();
		
		echo "
		<script>
				window.location.href='login.php?msg=cookie-mismatch';
		</script>	
		";

		exit();
	}


	// Finds users IP address
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$IP = strip_tags($_SERVER['HTTP_CLIENT_IP']);
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$IP = strip_tags($_SERVER['HTTP_X_FORWARDED_FOR']);
	} else {
		$IP = strip_tags($_SERVER['REMOTE_ADDR']);
	}


	// Checks ID address
	if ($_SESSION["ip"] != $IP ) {
		
		session_destroy();
		
		echo "
		<script>
				window.location.href='login.php?msg=cookie-mismatch';
		</script>	
		";

		exit();
	}


?>
