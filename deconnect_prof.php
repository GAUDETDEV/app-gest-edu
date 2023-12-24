<?php

	session_start();
	$_SESSION = [];
	session_destroy();

	header("location: connect_prof.php");

?>