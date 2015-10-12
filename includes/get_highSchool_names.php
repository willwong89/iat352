<!--  2. Perform database query -->
<?php
	
	$query = "SELECT * FROM highSchools;"; //Retrieve all the highSchool from db to create a nav
	$result = $db->query($query);// get results
	
	//$num_results = $result->num_rows;  //echo "<p>Number of members found: ".$num_results."</p>";
	
	// Test if there was a query error
    if (!$result)   die("Database query failed."); // if error, skip the rest of PHP code, and print an error
?>


<!-- 3. Store the result retrieved from db in a variable -->
<?php    
    $highSchool_names; 
    while ($row = mysqli_fetch_assoc($result)) 
    	$highSchool_names[$row["highSchool_id"]] = $row["highSchool_name"];

	
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

