<?php ini_set('display_errors', 1); ?><!-- Error Debugging -->
<?php session_start(); ?><!-- Load Session -->


<!DOCTYPE html>
<html>

<head>
	<title>IAT352: Assignment 2</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<?php $isLoggedIn = isset($_SESSION['valid_user']); ?>
<body>
<div id="container">
	<div id="header">
	
		<div id="sec-nav">
			<?php if(!$isLoggedIn) echo '<a href="register.php">register</a>'; ?>
			<?php if(!$isLoggedIn) echo '<a href="login.php">login</a>'; ?>

			<?php if($isLoggedIn) echo '<a href="view-member.php?user_id='.$_SESSION['user_id'].'">'.$_SESSION['user_username'].'</a> ';?>
			<?php if($isLoggedIn) echo '<a href="logout.php">logout</a> ';?>
			
		</div><!-- end sec-nav -->
		
		<div id="header-banner">
		<a href="index.php"><img src="images/siat-banner.png" alt="siat-banner.png"/></a>
		</div><!-- 	end header-banner	 -->

	</div><!-- 	end header -->
	
	
	
<!-- 
	<div id="main-nav">
		<?php if($isLoggedIn){
					if($_SESSION['user_memberType'] == 1) echo '<div id="post"><a href="post-blog.php">Post</a></div>'; 
				}
		?>
		<div id="news"><a href="view-blogs.php?title=News feed">News</a></div>
		<div id="members"><a href="view-member-list.php">Members</a></div>

	</div><!~~ end main-nav ~~>
 -->
	
	
<!-- 	<div id="content"> -->