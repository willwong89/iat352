<?php include 'includes/header.php'; ?>
<?php include 'includes/enableHTTPS.php'; ?>

<!--  1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?> 

<!--  2. Perform database query -->
<!--  3. Store the result retrieved from db in a variable -->
<?php include 'includes/get_highSchool_names.php';?>


<!-- Form validation -->
<?php
$errors = array();

if(isset($_POST['submit'])){
	// Start validating form
	// 1. Get the values from the form
	// 2. Validate the user inputs
	$user_username = trim($_POST["username"]);
	if($user_username == "") $errors['username'] =  "Please enter a user name.";


	$user_firstName = trim($_POST['firstName']);
	if($user_firstName == "") $errors['firstName'] =  "Please enter a first name.";
	
	
	$user_lastName = trim($_POST['lastName']);
	if($user_lastName == "") $errors['lastName'] =  "Please enter a last name.";
	
	$updatePassword = false;
	$user_password = NULL;
	$pass1 = $_POST["password1"];
	$pass2 = $_POST["password2"];
	if($pass1 == "" && $pass2 == "" ) {}
	else if($pass1 != $pass2) $errors['password'] =  "Passwords do not match."; 
	else { $user_password = $pass1; $updatePassword = true; }
	$user_password = password_hash( $user_password , PASSWORD_BCRYPT );//hash the password
	
	
	$user_email = trim($_POST["email"]);
	// strpos is faster than preg_match
	// use === to make exact match with false
	if (strpos($user_email, "@") === false) $errors['email'] =  "Email validation failed.";


	$user_phoneNumber = trim($_POST['phoneNumber']);
	if(!is_numeric($user_phoneNumber) && !empty($user_phoneNumber)) $errors['phoneNumber'] = "Phone number must be numeric value.";
		
		
	$user_highSchool_id = (int)$_POST['highschool_id'];
	
	
	$user_highSchoolGradYear = $_POST['highSchoolGradYear'];
	
	$user_twitter = trim($_POST["user_twitter"]);
	
	$user_flickr = trim($_POST["user_flickr"]);
	
	
	$user_description = $_POST['description'];
	$order = array("\r\n", "\n", "\r");//replace all the \n to <br /> to maintain the data sturcture of the data text file
	$replace = '<br />';
	$user_description = str_replace($order, $replace, $user_description);
	$user_description = str_replace("'", "\'", $user_description);
	$user_description = str_replace("\"", "\\\"", $user_description);
	
	//$user_photo = $_POST['photo'];
	
	
	$user_memberType = (int)$_POST['memberType'];
	
	
	/*
	echo "<p>$user_username - 
			 $user_firstName - 
			 $user_lastName - 
			 $user_password - 
			 $user_email - 
			 $user_phoneNumber - 
			 $user_highSchool_id - 
			 $user_highSchoolGradYear - 
			 $user_description - 
			 $user_memberType
			</p>";
	*/	
			

	if(count($errors) == 0){
		echo "submit now";
		//if no errors
		// 3. Perform database query
		//$query = "insert into user values('".$userID."', '".$firstName."', '".$lastName."', '".$email."')";
		 $query = "UPDATE users
			  SET user_username = '$user_username', 
			  	  user_firstName = '$user_firstName', 
			  	  user_lastName = '$user_lastName',
			  	  user_email =' $user_email',
			  	  user_phoneNumber = '$user_phoneNumber',
			  	  user_highSchool_id = $user_highSchool_id,
			  	  user_highSchoolGradYear = '$user_highSchoolGradYear',
			  	  user_description = '$user_description',
			  	  user_photo = '',
			  	  user_twitter = '$user_twitter',
			  	  user_flickr = '$user_flickr',
			  	  user_memberType = $user_memberType ";		  
		if($updatePassword == true){
			$query .= ",user_password = '$user_password' ";	  
		}
		
		$user_id = $_SESSION['user_id'];// 1. Get the user id
		$query.= "WHERE user_id=$user_id;";
			
		//echo "<p>$query</p>";			   		   
		$result = $db->query($query);
	
		// check for results. If success - redirect to info_success.php
		 if ($result) {
		 		include 'includes/setUserInfoToSession.php'; 
				$message =  "Congratulations. You edited your account info succesfully.";
				//header("Location: https://localhost/www8/login.php");
				header("Location: blankpage.php?message=$message");
				exit();
		} 	
		else {// else if error - skip the rest of PHP code, and print an error
			echo "An error has occurred. The item was not added.";
		}
	}//end if no errors

}//end if isset($_POST['submit'])
?>
			   		   




<div class="only">
<div id="register">
<h1>Edit account </h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="POST" autocomplete="off">
<!-- <form action="register-processing.php" method="POST" autocomplete="off"> -->
	<table>
		<tr><td><h2>Account Information</h2></td></tr>
    	
    	<tr>
    		<td><div class="label">User name </div>
    		<input name="username" value="<?php echo "".$_SESSION['user_username']; ?>" type="text" size="30" class="input" /></td>
    		<td><span class='register-error'>							
			<?php if (!empty($errors['username'])) echo $errors['username']; ?>
			</span></td>
    	</tr>
    	<tr>
    		<td><div class="label">Create password </div>
    		<input name="password1" type="password" size="30" class="input"/></td>
			<td><span class='register-error'>							
			<?php if (!empty($errors['password'])) echo $errors['password']; ?>
			</span></td>
		</tr>
		<tr>
    		<td><div class="label">Reenter password </div>
    		<input name="password2" type="password" size="30" class="input"/></td>
    	</tr>
    	<tr>
    		<td><div class="label">Name </div>
    		<input placeholder="First " name="firstName" value="<?php echo "".$_SESSION['user_firstName']; ?>" type="text" size="30" lass="input"/></td>
    	</tr>
    	
    	<tr>
    		<td><input placeholder="Last " name="lastName" value="<?php echo "".$_SESSION['user_lastName']; ?>" type="text" size="30" class="input"/></td>
    	</tr>
    	<?php 
    		if (!empty($errors['firstName']) || !empty($errors['lastName']) ){
    			echo '<tr><td>';
    		 	if(!empty($errors['firstName']))
    		 		echo'<span class="register-error">'.$errors["firstName"];
    		 	echo '</td><td>';
    			if(!empty($errors['lastName']))
    		 		echo'<span class="register-error">'.$errors["lastName"];
    			echo'</td></tr>'; 
    		 }
    	?>
    	<tr>
    		<td><div class="label"> E-mail </div>
    		<input name="email" value="<?php echo "".$_SESSION['user_email']; ?>" type="text" size="30" class="input"/></td>
    		<td><span class='register-error'>							
			<?php if (!empty($errors['email'])) echo $errors['email']; ?>
			</span></td>
    	</tr>
    	<tr>
    		<td><div class="label">Member Type </div>
    		<select name="memberType" class="input" id="memberType"/>
    			<?php 
    				if($_SESSION['user_memberType'] == 0)
    					echo'<option selected value="0">Visitor</option>'; 
    				else
    					echo'<option value="0">Visitor</option>'; 
    				if($_SESSION['user_memberType'] == 1)
    					echo'<option selected value="1">SIAT Student/Graduate</option>'; 
    				else
    					echo'<option value="1">SIAT Student/Graduate</option>'; 
    			?>
    		</select>
    	</tr>
    	
		<tr><td><h2>Personal Information</h2></td></tr>
		<!--    TODO: Populate the following only if the memberType is 1 	 -->
    	<tr>
    		<td><div class="label">Phone number </div>
    		<input name="phoneNumber" value="<?php echo "".$_SESSION['user_phoneNumber']; ?>" type="text" class="input" maxlength="10"/></td>
    		<td><span class='register-error'>							
			<?php if (!empty($errors['phoneNumber'])) echo $errors['phoneNumber']; ?>
			</span></td>
    	</tr>
    	<tr>
    		<td><div class="label">High School Attended </div>
    		<select name="highschool_id" class="input" id="highschool_id"/>
    		<?php foreach($highSchool_names as $key=>$value) 
    				  if($_SESSION['user_highSchool_id'] == $key)//Populate category list from db 
    				  	  echo "<option selected value=\"$key\">$value</option>";
    				  else
    				  	 echo "<option selected value=\"$key\">$value</option>";
    		?>
    					
    		</select>
    	</tr>
    	<tr>
    		<td><div class="label">Graduation Year </div>
    		<select name="highSchoolGradYear" class="input" id="highSchoolGradYear" >
    		<?php $startYear = 1980; $endYear = 2014;
    			for($year=$startYear ; $year<=$endYear ; $year++)
    				 if($_SESSION['user_highSchoolGradYear'] == $year)//Populate category list from db 
    				 	echo "<option selected value=\"$year\">$year</option>"; 
    			     else
    			     	echo "<option value=\"$year\">$year</option>"; 
    		?>
			</select>
			</td>
    	</tr>
    	<tr>
    		<td colspan="2"><div class="label">Description</div>
    		<textarea placeholder="Short term description including your goals, ambitions, etc." name="description" rows="10" cols="40" class="input"><?php echo "".$_SESSION['user_description'].""; ?></textarea></td>
    	</tr>
		
		<!-- Connecting With Social Media -->
		<tr>
		<td><h2>Connecting With Social Media</h2></td>
		</tr>
		
		<tr>
    		<td><div class="label">Flickr username </div>
    		<input name="user_flickr" value="<?php echo "".$_SESSION['user_flickr']; ?>" type="text" size="30" class="input" /></td>
    		</td>
    	</tr>
    	<tr>
    		<td><div class="label">Twitter username </div>
    		<input name="user_twitter" value="<?php echo "".$_SESSION['user_twitter']; ?>" type="text" size="30" class="input" /></td>
    		</td>
    	</tr>
    	
		<!-- Submit Button -->
		<tr>
			<td colspan="2" >
    			<input type="submit" name="submit" value="Edit account" class="button">
    		</td>
    	</tr>
    </table>
</form>
</div>
<div class="spacer"></div>
</div>
<?php include 'includes/footer.php'; ?>

<!--  4. Release returned data -->

<!-- 5. Close database connection   -->

