<div class="left-column-wrapper">
<div class="side">
<div id="view-blogs-nav">
	<h1>&nbsp;</h1>
	<a href="view-blogs.php?title=News feed">News</a>
	<?php if($isLoggedIn) echo '<a href="view-blogs.php?filterName=user_following&title=Following">Following</a>'; ?>
	<!-- <a href="blog-view.php?filterName=user_following">Following</a> -->
	<a href="view-blogs-selectSchool.php">Schools</a>
	<a href="view-blogs-selectCategory.php">Categories</a>
	<a href="view-member-list.php">Members</a>
	<?php if($isLoggedIn){
					if($_SESSION['user_memberType'] == 1) echo '<div id="post"><a href="post-blog.php">Post</a></div>'; 
				}
		?>
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
	<div class="spacer"></div>
</div><!-- end blog-view-nav -->
</div>
</div>