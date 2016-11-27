<?php

print_r($_REQUEST);

if(isset($_REQUEST["activation"]))
{
	header("Location: /server/views/dashboard/activation.php");
}

if($_REQUEST["page"] === "dashboard")
{
	if($_REQUEST["auth"])
		header("Location: server/views/dashboard/dashboard.php");
	else
		header("Location: index.php");
}