<?php include 'includes/header.php'; ?>
<?php
	include 'includes/dbconnect.php'; // 1. Create a database connection
?>

<div class="only">

<?php
	// 2. Read values from $_POST
	$blog_category_id = (int)$_POST['category_id'];
	$blog_user_id = (int)$_SESSION['user_id']; //get this from Sessions
	$blog_content_title = trim($_POST['content_title']);
	$blog_content_text = $_POST['content_text'];
	$blog_content_tags = trim($_POST['content_tags']);
	$blog_publish = 1;
	
// 	echo "$blog_category_id <br />" ;
// 	echo "$blog_user_id <br />" ;
// 	echo "$blog_content_title <br />" ;
// 	echo "$blog_content_text <br />" ;
// 	echo "$blog_publish <br />" ;
?>



<?php
	// 3. Vaidate the inputs
		
	//replace all the \n to <br /> to maintain the data sturcture of the data text file
	$order = array("\r\n", "\n", "\r");
	$replace = '<br />';
	$blog_content_text = str_replace($order, $replace, $blog_content_text);

	$blog_content_text = str_replace("'", "\'", $blog_content_text);
	$blog_content_text = str_replace("\"", "\\\"", $blog_content_text);
	
	$blog_content_title = str_replace("'", "\'", $blog_content_title);
	$blog_content_title = str_replace("\"", "\\\"", $blog_content_title);
	
	$blog_content_tags = str_replace("'", "\'", $blog_content_tags);
	$blog_content_tags = str_replace("\"", "\\\"", $blog_content_tags);
	$blog_content_tags = str_replace(" ", "", $blog_content_tags);
// 	$content_tags
	echo '<div class="oneP"><h1>Processing Blog Posting</h1>';
?>


	
<?php
	// 4. Perform database query
	$query = "INSERT INTO `blog_content` (`blog_category_id`, 
							  	   		  `blog_user_id`, 
								   		  `blog_content_title`, 
								   		  `blog_content_text`, 
								   		  `blog_content_tags`, 
								     	  `blog_publish`) 
								   
						   		   VALUES( $blog_category_id, 
						   		   		   $blog_user_id, 
						   		   		  '$blog_content_title', 
						   		   		  '$blog_content_text', 
						   		   		  '$blog_content_tags#', 
						   		   		   $blog_publish);";
						   		   		   
	$result = $db->query($query);
	
	// check for results
	// if success - redirect to info_success.php
	if ($result) {
		//echo $db->affected_rows." member inserted into database.";
		echo "<p>Congratulations. You posted it succesfully.</p>";
	} 
	else {// else if error - skip the rest of PHP code, and print an error
		echo "<p>An error has occurred. The item was not added.</p>";
	}
	
	echo '</div>';
?>
</div>

<!-- 5. Close database connection    -->
<?php $db->close(); ?>
<?php include 'includes/footer.php'; ?>