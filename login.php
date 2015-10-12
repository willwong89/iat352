<?php include 'includes/header.php'; ?>
<?php include 'includes/enableHTTPS.php'; ?>

<!-- 1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?>


<?php
// Is not logged in
// 1. get user id & pass from the textboxes

if (!isset($_SESSION['valid_user'])) {
	if (isset($_POST['userid']) && isset($_POST['password'])) {
	
	
	
		$user_username = $_POST['userid']; 
		
		$query = "SELECT user_password, user_id FROM `users` WHERE user_username = '$user_username'";  // 2. Perform database query
		$result = $db->query($query);	// get results
		
		// Test if there was a query error
		// if error, skip the rest of PHP code, and print an error
   		if (!$result) {  die("Database query failed.");  } 




   		$user_password = NULL; //to initiaze as NULL in case username is invalid
   		$user_id = NULL; 
//    		$user_firstName = NULL;
//    		$user_lastName = NULL;
//    		$user_email = NULL;
//    		$user_phoneNumber = NULL;
//    		$user_highSchool = NULL;
//    		$user_highSchoolGradYear = NULL;
//    		$user_description = NULL;
//    		$user_photo = NULL;
//    		$user_memberType = NULL;
//    		
//    		$user_info = NULL;
//    		
   		while ($row = mysqli_fetch_assoc($result)) {	
   			$user_password = $row["user_password"];
   			$user_id = $row["user_id"];
//    			echo "<h1>user_id = $user_id</h1>";
//    			$user_firstName = $row["user_firstName"];
//    			$user_lastName = $row["user_lastName"];
//    			$user_email = $row["user_email"];
//    			$user_phoneNumber = $row["user_phoneNumber"];
//    			$user_highSchool_id = $row["user_highSchool_id"];
//    			$user_highSchoolGradYear = $row["user_highSchoolGradYear"];
//    			$user_description = $row["user_description"];
//    			$user_photo = $row["user_photo"];
//    			$user_memberType = $row["user_memberType"];
// 
    	 }//end while
	

		if (password_verify($_POST['password'], $user_password)){	
			// visitor's name and password combination are correct

			// login succesful let it fall through the if
			// save the user's information in sessions
			$_SESSION['valid_user'] = $user_username;//user_name
			$_SESSION['user_id'] = $user_id;//user_id
			include 'includes/setUserInfoToSession.php'; 


		} else {
			//login failed, let them try again
			echo "<div class=\"only\" style=\"color:red;min-height:0px;\"><h1>Invalid login info, please try again</h1></div>";
		}
	} else {
		//login info missing - signing in first time
		//
	}
}

if (isset($_SESSION['valid_user'])) {
	//autheticated correctly 
	if (isset($_SESSION['callback_URL'])) {
		// go back where you came from
		$callback_URL=$_SESSION['callback_URL'];
		unset($_SESSION['callback_URL']);
		echo $callback_URL;
		header('Location: '.$callback_URL);
		exit();
	} else {
		//echo "<h1>Hi. Welcome back ".$_SESSION['user_firstName']." ".$_SESSION['user_lastName']."</h1>";
		//echo "<p>You are now logged in.</p>";
		header("Location: view-blogs.php?title=News feed");
		exit();
	}
} else {
	//did not authenticate yet or failed previous attempt
	//show form
	?>
	<div class="only">
	<div id="login">
	<h1> Login </h1>
	<table><form method="post" action="login.php">
    	<tr>
    		<td><div class="label">Username </div>
    		<input name="userid" type="text" class="input" /></td>
    	</tr>
    	<tr>
    		<td><div class="label">Password </div>
    		<input name="password" type="password" class="input"/></td>
 
		<!-- Submit Button -->
		<tr>
			<td colspan="2" >
    			<input type="submit" name="submit" value="Login" class="button">
    		</td>
    	</tr>
    </form></table>
    </div>
    </div>
<?php
}
?>


<?php include 'includes/footer.php'; ?>
<!-- 
<?php
	// 4. Release returned data & 5. Close database connection  
	include 'includes/dbdisconnect.php';
?>      
 -->
