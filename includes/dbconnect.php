<?php include 'config/dbinfo.php'; ?> <!-- db info stored at another directory. -->


<?php
  // 1. Create a database connection
  // Create new connetion
  @ $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded  
  // if connection failed, skip the rest of PHP code, and print an error
  if (mysqli_connect_errno()) {
	echo 'Error: Could not connect to database. Please try again later.'; exit;
  }
?>