<?php
	ob_start();
	session_start();
	session_destroy();
	$_SESSION['megaUser'] = null;
	$_SESSION['megaPass'] = null;
	header("Location: login");
?>