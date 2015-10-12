<?php include 'includes/header.php'; ?>

<!--  1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?> 


<!--  2. Perform database query -->
<?php
	$follower = NULL;
	$following = NULL;
	if(!empty($_GET['follower'])) $follower = $_GET['follower'];
	if(!empty($_GET['following'])) $following = $_GET['following'];

	//$query = "INSERT INTO user_followings (follower_id,following_id) VALUES ($follower , $following);";
	if($follower != NULL || $following != NULL){
		$query = "DELETE FROM user_followings WHERE follower_id=$follower AND following_id=$following";
		$result = $db->query($query);// get results
    	if (!$result)   die("Database query failed."); // Test if there was a query error. If error, skip the rest of PHP code, and print an error
    
    	if($result){
    		include 'includes/setUserInfoToSession.php'; 
    		//update $SESSION
    		if (isset($_SESSION['callback_URL'])) {
				//Direct the user back to the previous page
				$callback_URL=$_SESSION['callback_URL'];
				unset($_SESSION['callback_URL']);
				echo $callback_URL;
				header('Location: '.$callback_URL);
				exit();
			}
			else{
				header("Location: view-member-list.php");
				exit();
			}
    	}//end if $result
    }//end if $follower != NULL || $following != NULL
?>


<!-- 3. Store the result retrieved from db in a variable -->
<?php    
?>



<!--  4. Close database connection   -->
<?php $db->close(); ?>


<!-- <?php include 'includes/footer.php'; ?> -->