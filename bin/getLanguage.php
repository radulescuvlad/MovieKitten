<?php
	session_start();
	if (!isset($_SESSION["language"])) {
		$_SESSION["language"] = "English";
		$json = json_encode("English");
	}
	elseif ($_SESSION["language"] == "English") {
		$_SESSION["language"] = "English";
		$json = json_encode("English");
	}
	elseif ($_SESSION["language"] == "Romanian") {
		$_SESSION = "Romanian";
		$json = json_encode("Romanian");
	}
	echo $json;
	exit();
?>