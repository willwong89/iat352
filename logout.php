<?php include 'includes/header.php'; ?>

<?php
	$message = "";
	if (isset($_SESSION['valid_user'])) {
		unset($_SESSION['valid_user']);
		$message = "You have been logged out.";
	} 
	else {
		$message = "You were not logged in.";
	}	

	session_destroy();
	
	header("Location: blankpage.php?message=$message");
	exit();

?>

<?php include 'includes/footer.php'; ?>