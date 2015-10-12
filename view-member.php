<script src="js/script.js"></script>

<?php 
	include 'includes/header.php'; 
	include_once 'includes/disableHTTPS.php';
?>
<!-- 1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?>


<?php
	/*	Which member's data to display.	*/ 	
	$user_id = NULL; 
	if(!empty($_GET['user_id'])) $user_id = $_GET['user_id'];
	//echo"$user_id";

	/*	What page content to display. Blog? Flickr Images? Tweets?	*/ 	
	$content = NULL; 
	if(!empty($_GET['content'])) $content = $_GET['content'];
	
	
	
	$flickrID  = NULL;
   	$twitterID = NULL;
	/* get this user's soical media ID from db */
	 	
	 	$query = "SELECT user_flickr, user_twitter FROM `users` WHERE user_id = '$user_id'";  // 2. Perform database query
		$result = $db->query($query);	// get results

		// Test if there was a query error. If error, skip the rest of PHP code, and print an error
   		if (!$result) {  die("Database query failed.");  } 
   		else {
			while ($row = mysqli_fetch_assoc($result)) {	
   				$flickrID = $row["user_flickr"];
   				$twitterID = $row["user_twitter"];
    	 	}//end while
   		}//end else
   		//$flickrID = "xfranki";
   		//$twitterID = "frankiexng";
$howManyTweets = 3;
$flickrImageSize = 's';
$howManyBlogs = 2;
if($content == 'twitter') $howManyTweets = 20;
if($content == 'flickr') $flickrImageSize = 'm';
if($content != "twitter" && $content != "flickr" && $content != "all") $howManyBlogs = 20;
   
   	/*	
	$socialMediaName = NULL; 
	if(!empty($_GET['socialMediaName'])) $socialMediaName = $_GET['socialMediaName'];
	*/
	
	if(isset($_SESSION['valid_user'])){
		$user_followings = $_SESSION['user_followings'];
		$user_followers = $_SESSION['user_followers'];
	}//end if logged in
?>
<?php
	// 4. Release returned data & 5. Close database connection  
	include 'includes/dbdisconnect.php';
?>      







<!-- view-member-info div begins -->
<?php
		//include 'view-member-info.php';
?>
<!--  end view-member-info -->



<script>
	var uID = "<?php echo $user_id; ?>";
	var fID = "<?php echo $flickrID; ?>";
	var tID = "<?php echo $twitterID; ?>";
	
	var hmt = "<?php echo $howManyTweets; ?>";
	var fis = "<?php echo $flickrImageSize; ?>";
	var hmb = "<?php echo $howManyBlogs; ?>";
	
    updateViewMemberBlog(uID, hmb);
    //updateViewMemberTwitter(uID, tID, hmt);
    //updateViewMemberFlickr(uID, fID, fis);
</script>

<!-- view-blogs div begins -->
<?php
	if($content != "twitter" && $content != "flickr" && $content != "all"){
	echo '<div class="left-column-wrapper">';
		
		echo "<div class=\"side\">";
		include 'view-member-info.php';
		echo "</div>";
		
		if($flickrID != null){
			echo "<div class=\"side\">";
			include "view-member-flickr.php";
			echo "</div>";
		}
		
		if($twitterID != null){
			echo "<div class=\"side\">";
			include 'view-member-twitter.php';
			echo "</div>";
		}
	echo '</div>';
	
		echo "<div class=\"main\">";
		include 'view-member-blog.php';
		echo "</div>";
	}//end if conent == NULL
?>
<!--  end view-blogs -->


<!-- view-tweets div begins -->
<?php
	if($content == "twitter"){
		
	echo '<div class="left-column-wrapper">';
		echo "<div class=\"side\">";
		include 'view-member-info.php';
		echo "</div>";
		
		echo "<div class=\"side\">";
		include 'view-member-blog.php';
		echo "</div>";
		
		if($flickrID != null){
			echo "<div class=\"side\">";
			include "view-member-flickr.php";
			echo "</div>";
		}
	echo '</div>';
	
		if($twitterID != null){
			echo "<div class=\"main\">";
			include 'view-member-twitter.php';
			echo "</div>";
		}
	}//end if content == twitter
?>
<!--  end view-tweets -->



<!-- view-flickr div begins -->
<?php
		
	if($content == "flickr"){
	
	echo '<div class="left-column-wrapper">';
		
		echo "<div class=\"side\">";
		include 'view-member-info.php';
		echo "</div>";
		
		echo "<div class=\"side\">";
		include 'view-member-blog.php';
		echo "</div>";
		
		if($twitterID != null){
			echo "<div class=\"side\">";
			include 'view-member-twitter.php';
			echo "</div>";
		}
	echo '</div>';
		
		if($flickrID != null){
			echo "<div class=\"main\">";
			include "view-member-flickr.php";
			echo "</div>";
		}
		
		
	}//end if content == flickr
?>
<!--  end view-flickr -->


<?php
	if($content == "all"){
		echo "<div class=\"main\">";
		include 'view-member-blog.php';
		echo "</div>";
		
		if($twitterID != null){
			echo '<div id="view-tweets" class="main"><h1>Tweets</h1>';
			include 'view-member-twitter.php';
			echo '</div>';
		}
		if($flickrID != null){
			echo "<div class=\"main\">";
			include "view-member-flickr.php";
			echo "</div>";
		}
	}
?>


<?php include 'includes/footer.php'; ?>