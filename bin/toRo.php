<?php
	session_start();
	$_SESSION["language"] = "Romanian";
	$json = json_encode("Romanian");
	echo $json;
	exit();
?>