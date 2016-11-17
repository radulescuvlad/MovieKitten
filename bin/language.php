<?php
	if ($_SESSION["language"] == "English")
		$_SESSION["language"] = "Romanian";
	elseif ($_SESSION["language"] == "Romanian")
		$_SESSION["language"] = "English";
	exit();
?>
