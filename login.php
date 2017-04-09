<?php
	$username = $_GET["username"];

	if ($username == "sales") {
		header("Location: dashboardS.html");
	}
	else if ($username == "genaff") {
		header("Location: dashboardG.html");
	}
	else if ($username == "production") {
		header("Location: dashboardP.html");
	}
	else if ($username == "quality") {
		header("Location: dashboardQ.html");
	}
	else {
		header("Location: index.html?login=failed");
	}
?>