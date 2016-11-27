<?php

print_r($_REQUEST);

if(isset($_REQUEST["activation"]))
{
	header("Location /server/views/dashboard/activation.php");
}

if(isset($_REQUEST["dashboard"]))
{
	header("Location /server/views/dashboard/dashboard.php");
}

