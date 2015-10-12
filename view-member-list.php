<?php 
	include 'includes/header.php'; 
	include_once 'includes/disableHTTPS.php';
?>

<?php 
	if(isset($_SESSION['valid_user'])){
		$user_followings = $_SESSION['user_followings'];
		$user_followers = $_SESSION['user_followers'];
	}//end if logged in
?>


<!-- 1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?>
<?php include 'includes/get_highSchool_names.php'; ?>

<?php
	// 2. Perform database query
	$query = "select * from users WHERE user_memberType = 1";  //Do not show visitors
	//echo "<p>$query</p>";
	
	// get results
	$result = $db->query($query);
	
	//$num_results = $result->num_rows;  //echo "<p>Number of members found: ".$num_results."</p>";
	
	// Test if there was a query error
	// if error, skip the rest of PHP code, and print an error
   if (!$result) { 
     die("Database query failed."); 
   } 
?>


<?php include 'includes/view-blogs-nav.php'?>
<div id="view-member-list" class="main">
<h1>Members</h1>
<table>
<?php
 				
 				while ($row = mysqli_fetch_assoc($result)) {	
 					echo "<tr>";		   			   
					echo "<td><div class=\"name\"><a href=\"view-member.php?user_id=".$row["user_id"]."\">".$row["user_firstName"]." ".$row["user_lastName"]."</a></div></td>";
					//echo "<td>".$row["user_id"]."</td>";
					echo "<td><div class=\"email\">".$row["user_email"]."</div></td>";
					echo "<td><div class=\"highschool\"><a href=\"view-blogs.php?filterName=highSchool_id&filterValue=".$row["user_highSchool_id"]."&title=".$highSchool_names[$row["user_highSchool_id"]]."\">".$highSchool_names[$row["user_highSchool_id"]]."</a></div></td>";
					if(isset($_SESSION['valid_user'])){
						if($row["user_id"] != $_SESSION['user_id']){//if this is not the logged in user
							if (count($user_followings)>0 && in_array($row["user_id"], $user_followings)) 
    							echo "<td><div class=\"following-btn\"><a href=\"following-remove.php?follower=".$_SESSION['user_id']."&following=".$row["user_id"]."\">Following</div></td>";
							else
								echo "<td><div class=\"follow-btn\"><a href=\"following-add.php?follower=".$_SESSION['user_id']."&following=".$row["user_id"]."\">Follow</a></div></td>";
						}//end if
					}//end if logged in
					echo "</tr>";
               }//end while
              
?>
</table>
<div class="spacer"></div>
</div>


<?php
	// 4. Release returned data & 5. Close database connection  
	include 'includes/dbdisconnect.php';
?>      
<?php include 'includes/footer.php'; ?>