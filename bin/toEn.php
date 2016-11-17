<?php
	session_start();
	$_SESSION["language"] = "English";
	$json = json_encode("English");
	echo $json;
	exit();
?>