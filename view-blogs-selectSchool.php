<?php 
	include 'includes/header.php'; 
	include_once 'includes/disableHTTPS.php';
?>

<!--  1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?> 

<!--  2. Perform database query -->
<!--  3. Store the result retrieved from db in a variable -->
<?php include 'includes/get_highSchool_names.php';?>
<?php include 'includes/view-blogs-nav.php'?>
<div class="main">
<div id="select-highschool">
<h1>Select a school </h1>

<?php

	foreach($highSchool_names as $key=>$value) 
    	echo "<div class=\"highschool\">
    		  <a href=\"view-blogs.php?filterName=highSchool_id&filterValue=$key&title=$value\">$value</a>
    		  </div>";
    		  
?>
<div class="spacer"></div>
</div></div>
<?php include 'includes/footer.php'; ?>

<!--  4. Release returned data -->
<!--  5. Close database connection   -->
<?php include 'includes/dbdisconnect.php'; ?> 