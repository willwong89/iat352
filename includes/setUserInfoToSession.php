<?php include 'includes/header.php';  ?>
<!-- 1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?>


<!-- 2.  -->
<!-- 3.  -->
<?php
	if (isset($_SESSION['valid_user'])) {
	

		$user_id = $_SESSION['user_id']; 
		//echo $user_id;
		$query = "SELECT * FROM `users` WHERE user_id = '$user_id'";  // 2. Perform database query
		$result = $db->query($query);	// get results

		// Test if there was a query error. If error, skip the rest of PHP code, and print an error
   		if (!$result) {  die("Database query failed.");  } 
   		else {
			while ($row = mysqli_fetch_assoc($result)) {	
				$_SESSION['user_username'] = $row["user_username"];
   				$_SESSION['user_id'] = $row["user_id"];
   				$_SESSION['user_firstName'] = $row["user_firstName"];
   				$_SESSION['user_lastName'] = $row["user_lastName"];
   				$_SESSION['user_email'] = $row["user_email"];
   				$_SESSION['user_phoneNumber'] = $row["user_phoneNumber"];
   				$_SESSION['user_highSchool_id'] = $row["user_highSchool_id"];
   				$_SESSION['user_highSchoolGradYear'] = $row["user_highSchoolGradYear"];
   				$_SESSION['user_description'] = $row["user_description"];
   				$_SESSION['user_photo'] = $row["user_photo"];
   				$_SESSION['user_flickr'] = $row["user_flickr"];
   				$_SESSION['user_twitter'] = $row["user_twitter"];
   				$_SESSION['user_memberType'] = $row["user_memberType"];
    	 	}//end while
   		}
   		
   		
   		//set the user's followings and followers in session
   		////1. Get the user's Followings
		$result = $db->query("SELECT * FROM `user_followings` WHERE follower_id = $user_id");
		if (!$result) {  die("Database query failed.");  } // Test if there was a query error. If error, skip the rest of PHP code, and print an error
   		else{
   			$user_followings = NULL; //to initiaze as NULL in case this user is not following anyone
   			while ($row = mysqli_fetch_assoc($result))
   				$user_followings[count($user_followings)] = $row["following_id"];
			//2. Save the user's Followings in Session
			$_SESSION['user_followings'] = $user_followings;
		}


		//3. Get the user's Followers
		$result = $db->query("SELECT * FROM `user_followings` WHERE following_id = $user_id");	// get results
		if (!$result) {  die("Database query failed.");  } // Test if there was a query error. If error, skip the rest of PHP code, and print an error
   		else{
   			$user_followers = NULL; //to initiaze as NULL in case username is invalid
   			while ($row = mysqli_fetch_assoc($result))
   				$user_followers[count($user_followers)] = $row["follower_id"];
			//4. Save the user's Followers in Session
			$_SESSION['user_followers'] = $user_followers;
		}
		
		
	}//end is valid user
	else{
		echo"invalid user";
	}
	
// 	echo"".$_SESSION['user_lastName'];
// 	$user_followings = $_SESSION['user_followings'];
// 	for($i=0 ; $i<count($user_followings) ; $i++){
// 		echo "$user_followings[$i] <br/>";
// 	}
?>


<!-- 4. Release returned data -->
<!-- 5. Close database connection   -->
<?php include 'includes/dbdisconnect.php'; ?>   