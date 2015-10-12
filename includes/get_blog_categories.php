<!--  2. Perform database query -->
<?php
	
	$query = "SELECT * FROM blog_categories;"; //Retrieve all the blogs from db to create a nav
	$result = $db->query($query);// get results
	
	//$num_results = $result->num_rows;  //echo "<p>Number of members found: ".$num_results."</p>";
	
	// Test if there was a query error
    if (!$result)   die("Database query failed."); // if error, skip the rest of PHP code, and print an error
?>


<!-- 3. Store the result retrieved from db in a variable -->
<?php    
    $blog_categories; 
    while ($row = mysqli_fetch_assoc($result)) 
    	$blog_categories[$row["blog_category_id"]] = $row["blog_category_name"];

	
//	Use the following code to retieve the keys and values from the variable
/*
	foreach($blog_categories as $key=>$value) // and print out the values
    	echo 'The value of $arr['."'".$key."'".'] is '."'".$value."'".' <br />';
*/

//Array Key Value Example    	
/*
	$arr ;
	$arr['dog'] = "doggg";
	$arr['cat'] = "cat";
	foreach($arr as $key=>$value) // and print out the values
    	echo 'The value of $arr['."'".$key."'".'] is '."'".$value."'".' <br />';
*/
?>

