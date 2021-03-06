<?php
/* 
** PREPARING TABLES 
*/
//MOVIES TABLE
	$movies = "CREATE TABLE IF NOT EXISTS movies (
			movie_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			library_id SMALLINT UNSIGNED NOT NULL,
			title VARCHAR(80) NOT NULL,
			actors VARCHAR(250) NOT NULL,
			director VARCHAR(80) NOT NULL,
			producer VARCHAR(80) NOT NULL,
			year_of_prod YEAR(4) NOT NULL,
			language VARCHAR(80) NOT NULL,
			category enum('Action', 'Romance', 'Western', 'Sci-Fi', 'Erotic') NOT NULL,
			video VARCHAR(80) NOT NULL,
			created_at TIMESTAMP NOT NULL,
			modified_at TIMESTAMP NOT NULL,
			poster_url text NOT NULL,
			storyline text NOT NULL,
			CONSTRAINT `fk_movie_library`
				FOREIGN KEY (library_id) REFERENCES libraries (library_id)
				ON DELETE CASCADE
				ON UPDATE RESTRICT
			)
			ENGINE=InnoDB;";
//USERS TABLE
	$users = "CREATE TABLE IF NOT EXISTS users (
			user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			user_level INT(11) NOT NULL default 0,
			email VARCHAR(80) NULL,
			first_name VARCHAR(255) NOT NULL,
			last_name VARCHAR(255) NOT NULL,
			phone VARCHAR(20) NULL,
			activation_key INT(11) NULL,
			password text NOT NULL,
			created_at TIMESTAMP NOT NULL,
			modified_at TIMESTAMP NOT NULL,
			picture_url text NULL,
			gender BOOLEAN NOT NULL,
			birthdate DATE NOT NULL
			)
			ENGINE=InnoDB;";
//LIBRARIES TABLE
	$libraries = "CREATE TABLE IF NOT EXISTS libraries (
			library_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			user_id MEDIUMINT UNSIGNED NOT NULL,
			shelf_name VARCHAR(80) NOT NULL,
			shelf_desc VARCHAR(255) NOT NULL,
			created_at TIMESTAMP NOT NULL,
			modified_at TIMESTAMP NOT NULL,
			is_private BOOLEAN NOT NULL default 0,
			shelf_icon text NOT NULL,
			CONSTRAINT `fk_library_user`
				FOREIGN KEY (user_id) REFERENCES users (user_id)
				ON DELETE CASCADE
				ON UPDATE RESTRICT
			) 
			ENGINE=InnoDB;";
/*
** CREATE DATABASE 
*/
function create_db ($dbName) {
	$sql = 'CREATE DATABASE IF NOT EXISTS '.$dbName;
	try {	    
	    $dbh = new PDO('mysql:host=localhost;charset=utf8', 'root', '');
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stmt = $dbh->prepare($sql);	        
	    $stmt->execute();
	    $nb = $stmt->rowCount();
	    if($nb > 0) {
	    	echo "<span class='blue-text'>Database created...</span><br/>";
	    } else {
	    	echo "Database already exists! Skip to next step...<br/>";
	    }
	    $sql2 = "use ".$dbName;  
    	$dbh->exec($sql2);    	
    	echo "Using the new database...<br/>";
	    // Close connection
	    $dbh=null;	    
	} catch (PDOException $e) {
	    print "Error: " . $e->getMessage() . "<br/>";
	    die();
	}
}
/* 
** CREATE TABLE 
*/
function create_table ($sql, $db) {
	try {
		$dbh = $db;
		$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		print("<span class='blue-text'>Table created...</span><br/>");		
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
}