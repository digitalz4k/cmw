<?php

if(file_exists("server/config/config.php"))
{
	require_once("server/init.php");
} else {
	header("location: install/install.php");
}