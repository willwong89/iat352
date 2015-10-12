
<!-- 1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?>
<!-- 2(a). Perform database query -->
<?php
	$query = "select * from users JOIN highSchools ON (users.user_highSchool_id = highSchools.highSchool_id) WHERE user_id = $user_id"; 
	$result = $db->query($query);// get results
	// Test if there was a query error. If error, skip the rest of PHP code, and print an error
   if (!$result) die("Database query failed.");  
?>


<?php

	echo'<div id="view-member-info">';
 		while ($row = mysqli_fetch_assoc($result)) {			   
		   
					echo "<h1><a href=\"view-member.php?user_id=".$user_id."\">".$row["user_firstName"]." ".$row["user_lastName"]."</a></h1>";
					echo "<div class=\"highschool\"><a href=\"view-blogs.php?filterName=highSchool_id&filterValue=".$row["highSchool_id"]."&title=".$row["highSchool_name"]."\">".$row["highSchool_name"]."</a></div>";
					echo "<div class=\"email\">".$row["user_email"]."</div>";
					echo "<div class=\"phone\">".$row["user_phoneNumber"]."</div>";
					echo "<div class=\"description\">".$row["user_description"]."</div>";
					if(isset($_SESSION['valid_user'])){
						if($row["user_id"] != $_SESSION['user_id']){//if this is not the logged in user
							if (count($user_followings)>0 && in_array($row["user_id"], $user_followings)) 
    							echo "<div class=\"following-btn\"><a href=\"following-remove.php?follower=".$_SESSION['user_id']."&following=".$row["user_id"]."\">Following</a></div>";
							else
								echo "<div class=\"follow-btn\"><a href=\"following-add.php?follower=".$_SESSION['user_id']."&following=".$row["user_id"]."\">Follow</a></div>";
						}//end if
						else{
							//if the member is viewing himself
							echo "<div class=\"edit-btn\"><a href=\"edit-account.php\">Edit</a></div>";
						}
					}//end if logged in
					if($row["user_flickr"] != NULL){
						echo "<a href=\"view-member.php?user_id=".$user_id."&content=flickr&flickrID=".$row["user_flickr"]."\"><div class=\"flickr-btn\"></div></a>";
					}
					if($row["user_twitter"] != NULL){
						echo "<a href=\"view-member.php?user_id=".$user_id."&content=twitter&twitterID=".$row["user_twitter"]."\"><div class=\"twitter-btn\"></div></a>";
					}
               }//end while
?>

<?php
	// 4. Release returned data & 5. Close database connection  
	include 'includes/dbdisconnect.php';
?>      
<div class="spacer"></div>
</div><!-- end di view-member-info -->