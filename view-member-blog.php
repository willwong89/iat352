<!-- 1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?>

<?php
// $user_id = NULL; 
if(!empty($_GET['user_id'])) $user_id = $_GET['user_id'];
if(!empty($_GET['howManyBlogs'])) $howManyBlogs = $_GET['howManyBlogs'];

$blogURL = "<a href=\"view-member.php?user_id=$user_id\"> Blogs </a>";
echo "<div id=\"view-blogs\"><h1>$blogURL</h1>";



/* $content == NULL, 
		1. perform database query 
		2. generate html view-blogs content
		
		
		/*  <!-- 2(b). Perform database query */
		$query =  "SELECT * FROM blog_content 
			  		JOIN users 
			  		JOIN blog_categories 
			  		ON (
			  		blog_content.blog_user_id = users.user_id
			  		AND 
			  		blog_content.blog_category_id = blog_categories.blog_category_id 
			  		AND
			  		users.user_id = $user_id)
			  		ORDER BY blog_content.blog_content_date DESC LIMIT $howManyBlogs"; 
		$result = $db->query($query);// get results
		// Test if there was a query error. If error, skip the rest of PHP code, and print an error
   		if (!$result) die("Database query failed. :(");  



		/* Generate html view-blogs content */
		if (mysqli_num_rows($result) == 0) { 
			echo"<div class=\"blog-nopost\">This user has no post.</div>";
		}
 		while ($row = mysqli_fetch_assoc($result)) {
 			echo "<div class=\"blog\">";		 
			echo "<div class=\"blog-date\">".date('F j, Y',strtotime($row["blog_content_date"]))."</div>";
			echo "<div class=\"blog-title\">".$row["blog_content_title"]."</div>";
			echo "<div class=\"blog-content\">".$row["blog_content_text"]."</div>";
			/* Tags */
			$tag = str_replace(' ', '', $row["blog_content_tags"]);//remove all white spaces
			$tags = explode ('#', $tag);
			for($i=0 ; $i<count($tags) ; $i++){
				if (!empty($tags[$i]))//first and last are empty, skip them
					echo " <span class=\"hashtag\"><a href=\"view-blogs.php?filterName=blog_tag&filterValue=".$tags[$i]."\">#".$tags[$i]."</a></span> ";
			}//end for
			echo "<div class=\"blog-category\"><a href=\"view-blogs.php?filterName=blog_category_id&filterValue=".$row["blog_category_id"]."&title=".$row["blog_category_name"]."\">".$row["blog_category_name"]."</a></div>";
			echo "</div>";//end div blog
		}//end
		

?>
<?php
	// 4. Release returned data & 5. Close database connection  
	include 'includes/dbdisconnect.php';
?>      
<div class="spacer"></div>
</div><!-- end div view-blog -->