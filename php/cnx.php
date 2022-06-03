<?php
	$cnx = mysqli_connect("localhost", "karl", "password1", "notes_db");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "<p style = 'color: red'>Error: Could not connect to the database! " . $mysqli -> connect_error . "</p>";
		exit(); // stops app
	  exit();
	}
?>	