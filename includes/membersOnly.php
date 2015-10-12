<?php
	//Allow only member to access a page
	if ($_SESSION['user_memberType'] != 1) {
		//Redirect any visitor users to the following page
		header("Location: visitor-denied.php");
		exit;
	}
?>