<?php
//force HTTPS for the form submission if not set already
if($_SERVER["HTTPS"] != "on") {
	header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	exit;
}
?>