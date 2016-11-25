<?php

require_once("sql_init.php");

//CREATING DATABASE
$database = create_db("testcmw54");

$db = new PDO("mysql:dbname=testcmw54;host=localhost", 'root', '');

//CREATING TABLES
$movies = "CREATE TABLE IF NOT EXISTS movies (
		_id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
		title VARCHAR( 80 ) NOT NULL,
		actors VARCHAR( 250 ) NOT NULL,
		director VARCHAR( 80 ) NOT NULL,
		producer VARCHAR( 80 ) NOT NULL,
		year_of_prod YEAR( 4 ) NOT NULL,
		language VARCHAR( 80 ) NOT NULL,
		category enum('Action', 'Romance', 'Western', 'Sci-Fi', 'Erotic') NOT NULL,
		video VARCHAR( 80 ) NOT NULL,
		shelf_id INT(11) NOT NULL,
		created_at TIMESTAMP NOT NULL,
		modified_at TIMESTAMP NOT NULL,
		poster_url text NOT NULL,
		storyline text NOT NULL);";

$users = "CREATE TABLE IF NOT EXISTS users (
		user_id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
		user_level INT( 11 ) NOT NULL,
		login VARCHAR( 80 ) NOT NULL,
		email VARCHAR( 80 ) NOT NULL,
		full_name VARCHAR( 255 ) NOT NULL,
		phone INT( 20 ) NOT NULL,
		activation_key INT( 11 ) NOT NULL,
		password text NOT NULL,
		created_at TIMESTAMP NOT NULL,
		modified_at TIMESTAMP NOT NULL,
		picture_url text NOT NULL);";

$libraries = "CREATE TABLE IF NOT EXISTS libraries (
		library_id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
		user_id INT( 11 ) NOT NULL,
		shelf_name VARCHAR( 80 ) NOT NULL,
		shelf_desc VARCHAR( 255 ) NOT NULL,
		created_at TIMESTAMP NOT NULL,
		modified_at TIMESTAMP NOT NULL,
		shelf_icon text NOT NULL);";

$movies_table = create_table($movies, $db);
$users_table = create_table($users, $db);
$libraries_table = create_table($libraries, $db);