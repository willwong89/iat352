 		<div class="spacer"></div>
	</div><!-- end container	 -->

	<div id="footer">
		<p>2014 &nbsp; William Wong. &nbsp; All Rights Reserved.</p>
	</div><!-- end footer -->
	
	
</body>

</html>

<!-- Store the Callback URL -->
<?php $_SESSION['callback_URL'] = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI']; ?>