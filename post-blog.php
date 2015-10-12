<?php include 'includes/header.php'; 
	  include_once("includes/membersOnly.php"); //Members only
	  include_once 'includes/disableHTTPS.php'; 
?>


<!--  1. Create a database connection -->
<?php include 'includes/dbconnect.php';  ?> 

<!--  2. Perform database query -->
<!--  3. Store the result retrieved from db in a variable -->
<?php include 'includes/get_blog_categories.php';?>

<div id="post-blog" class="only">
<h1>Write a post</h1>
<!-- 
<p><? echo "Hi, ". $_SESSION['valid_user']; ?></p>
<p><? echo "Your user ID is ". $_SESSION['user_id']; ?></p>
 -->

<form action="post-blog-processing.php" method="POST" autocomplete="off">
	<table>

    	<tr>
    		<td><input name="content_title" type="text" class="inputTitle" placeholder="Title" size="30"/></td>
    	</tr>
    	
    	<tr>
    		<td><textarea name="content_text" rows="10" cols="50" class="textarea" placeholder="" ></textarea></td>
    	</tr>
    	
    	<tr>
    		<td> <span class="label">Tags: </span><input name="content_tags" type="text" class="inputTags" placeholder="e.g: #sfu #iat" size="50"/></td>
    	</tr>
    	
    	<tr>
    		<td>
    		<span class="label">Category: </span><select name="category_id" class="input" id="category_id" />
    		<?php
    			//Populate category list from db
    			foreach($blog_categories as $key=>$value) 
    				echo "<option value=\"$key\">$value</option>";
    		?>
    		</select>
    		</td>
    	</tr>
    	
    	
		<!-- Submit Button -->
		<tr>
			<td colspan="2" >
    			<input type="submit" name="submit" value="Publish Post" class="button">
    		</td>
    	</tr>
    </table>
</form>
<div class="spacer"></div>
</div>

<?php include 'includes/footer.php'; ?>

<!--  4. Release returned data -->
<!--  5. Close database connection   -->
<?php include 'includes/dbdisconnect.php'; ?> 