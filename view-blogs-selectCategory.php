<?php 
	include 'includes/header.php'; 
	include_once 'includes/disableHTTPS.php';
?>

<!--  1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?> 

<!--  2. Perform database query -->
<!--  3. Store the result retrieved from db in a variable -->
<?php include 'includes/get_blog_categories.php';?>
<?php include 'includes/view-blogs-nav.php'?>
<div class="main">
<div id="select-category">
<h1>Select a category </h1>

<?php

	foreach($blog_categories as $key=>$value) 
    	echo "<div class=\"blog-category\">
    		  <a href=\"view-blogs.php?filterName=blog_category_id&filterValue=$key&title=$value\">$value</a>
    		  </div>";
    		  
?>
<div class="spacer"></div>
</div></div>

<?php include 'includes/footer.php'; ?>

<!--  4. Release returned data -->
<!--  5. Close database connection   -->
<?php include 'includes/dbdisconnect.php'; ?> 
