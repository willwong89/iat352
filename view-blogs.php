<?php 
	include 'includes/header.php'; 
	include_once 'includes/disableHTTPS.php';
?>

<!-- 1. Create a database connection -->
<?php include 'includes/dbconnect.php'; ?>


<?php include 'includes/view-blogs-nav.php'?>
<?php 
	$title;
	if(isset($_GET['title']))
		$title = $_GET['title']; 
	else
		$title = "";
?>


<!-- <h1>View </h1> -->
<?php echo '<div id="view-blogs" class="main">'; ?>
<?php
	
	$filterName = NULL; //[stored in session] user_following
			 		    //[require filterValues] user_highSchool, blog_category_id, blog_user_id
	
	$filterValue = NULL;//school - string
						//blog_category_id - categoryID
						//blog_user_id - userID
	
	
	
	
	if(!empty($_GET['filterName'])) {
		$filterName = $_GET['filterName'];
		$_SESSION['filterName'] = $filterName;
	}
	if(!empty($_GET['filterValue'])) {
		$filterValue = $_GET['filterValue'];
		$_SESSION['filterValue'] = $filterValue;
	}
	//get how many blogs in db in total
	$result = $db->query("SELECT COUNT(*) AS count FROM blog_content");
	$howManyBlogs; 
	while ($row = mysqli_fetch_assoc($result)) { $howManyBlogs = $row['count']; }

	//echo "filter = $filterName, value = $filterValue";
?>
<!-- <div id="view-blogs"> -->
<?php
	// 2. Perform database query
	$query = "SELECT * FROM blog_content 
			  	JOIN users 
			  	JOIN blog_categories 
			  	JOIN highSchools 
			  	ON (
			  	blog_content.blog_user_id = users.user_id
			  	AND 
			  	blog_content.blog_category_id = blog_categories.blog_category_id 
			  	AND 
			  	users.user_highSchool_id = highSchools.highSchool_id "; 

	if($filterName == 'blog_user_id'){
		$blog_user_id = (int)$filterValue;
		$query .= "AND blog_content.blog_user_id = $blog_user_id";
	}
	else if($filterName == 'blog_category_id'){
		$blog_category_id = (int)$filterValue;
		$query .= "AND blog_content.blog_category_id = $blog_category_id";
	}	
	else if($filterName == 'user_following'){
		$followingCount = count($_SESSION['user_followings']);
		if($followingCount > 0){ //if the user is not following anyone
			$query .= "AND (";//blog_content.blog_user_id = 3 OR blog_content.blog_user_id = 2";
			foreach($_SESSION['user_followings'] as $key=>$value){ // and print out the values
    			$query .= "blog_content.blog_user_id = $value ";
    			if($key != $followingCount -1)
    				$query .= "OR ";
    		}
    		$query .= ")";
		}//end if $followingCount > 0
		else{
			$query .= "AND (blog_content.blog_user_id = 0) ";
			echo "<p style=\"text-align:center; font-size:12px;\">Sorry. You are not following anyone.</p>";
		}
	}
	else if($filterName == 'highSchool_id'){
		$query .= "AND users.user_highSchool_id = '$filterValue'";
	}
	else if($filterName == 'blog_tag'){
		$title = '#'.$filterValue;
		$query .= "AND blog_content.blog_content_tags LIKE '%#$filterValue#%'";
	}

	
	
	
	//finishing up the query
	$query .= ")ORDER BY blog_content.blog_content_date DESC ";
	if(!empty($_GET['page'])) {
// 		$start = 
		$query .="LIMIT ".((int)$_GET['page']-1) * 10 .", 10;";
	}

	
		//$viewByUserIDQuery = "blog_content.blog_user_id != ".$blog_user_id; 
		//$viewByCategoryIDQuery = "blog_content.blog_category_id != ".$blog_category_id;
	
	
	
// 		$query = "SELECT * FROM blog_content 
// 			  	JOIN users 
// 			  	JOIN blog_categories 
// 			  	ON (
// 			  	blog_content.blog_user_id = users.user_id
// 			  	AND 
// 			  	$viewByUserIDQuery
// 			  	AND 
// 			  	blog_content.blog_category_id = blog_categories.blog_category_id
// 			  	AND
// 			  	$viewByCategoryIDQuery
// 			  	);
// 			  	"; 
	
	// get results
	//echo "$query";
	$result = $db->query($query);
	
	//$howManyPosts = $result->num_rows;  //echo "<p>Number of members found: ".$num_results."</p>";
	
	// Test if there was a query error
	// if error, skip the rest of PHP code, and print an error
   if (!$result) { 
     die("Database query failed."); 
   } 
?>
<?php if($title == NULL) $title = 'News feed';echo"<h1>$title</h1>"; ?>

<table>
<?
		
		if($result->num_rows == 0){
			echo"<p>No post.</p><div class=\"spacer\"></div>";
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
					/* Category */
					echo "<div class=\"blog-category\"><a href=\"view-blogs.php?filterName=blog_category_id&filterValue=".$row["blog_category_id"]."\">".$row["blog_category_name"]."</a></div>";
					/* Publisher */
					echo "<div class=\"blog-publisher\"><i>published by: </i><a href=\"view-member.php?user_id=".$row["user_id"]."\">".$row["user_firstName"]." ".$row["user_lastName"]."</a></div>";
					
					echo "</div>";
               }//end while
              
              
//               echo"filterName = $filterName <br />";
//               echo"filterValue = $filterValue";

			 

               
               
//  while ($row = mysqli_fetch_assoc($result)) {			   
//                   echo "<tr>";				   
// 					echo "<td>".$row["blog_content_title"]."</td>";
// 					echo "<td>".$row["blog_content_text"]."</td>";
// 					echo "<td>".$row["blog_content_date"]."</td>";
// 
// 					echo "<td>published by: ".$row["user_username"]."</td>";
// 					echo "<td>category: ".$row["blog_category_name"]."</td>";
// 					echo "<td>".$row["highSchool_name"]."</td>";
//                    echo "</tr>";
//                }//end while
?>
</table>
<div class="spacer"></div>
</div>
<!-- 			 <div id="pagenav"> -->
<!-- 
			 <?php 
			 	for($i=1 ; $i<$howManyBlogs/10 ; $i++){//10 blogs each
			 		echo "<a href=\"view-blogs.php?filterName=$filterName&$filterValue=$filterValue&title=$title&page=$i\">page$i</a> ";
			 	}
			 	//echo "$howManyBlogs"; 
			 ?>
 -->
<!-- 			 </div> -->
<!-- </div> -->
<!--  4. Release returned data & 5. Close database connection   -->
	
<?php include 'includes/dbdisconnect.php'; ?>      
<?php include 'includes/footer.php'; ?>

