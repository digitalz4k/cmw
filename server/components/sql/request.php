<?php

function secure ($val) 
{
    if($val !== "") {
        return htmlentities($val);
    } else  {
       header("HTTP/1.0 500 Internal Server Error");
       die("Invalid value: " . $val);
    }
}

function verify_type ($val) 
{
	$phone_pattern = '/\+?[0-9][0-9()]{4,20}/';

	if(preg_match($phone_pattern, $val))
	{
		return 'phone';
	}
	else if(filter_var($val, FILTER_VALIDATE_EMAIL))
	{
		return 'email';
	}
	else
	{
		header("HTTP/1.0 500 Internal Server Error");
		die("Error with email or phone number.");
	}
}

function db_request ($sql, $params)
{
	require_once("./server/config/config.php");

	$PDO_info = 'mysql:host='.$DB["host"].';dbname='.$DB["name"].';charset=utf8';

	try {
	    
	    $dbh = new PDO($PDO_info, $DB["user"], $DB["pass"]);

	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $dbh->prepare($sql);
	        
	    $stmt->execute($params);
	    
	    $cols = $stmt->columnCount();
	    
	    if($cols>0)
	    	$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    else
	    	$res = null;

	    $nb = $stmt->rowCount();

	    // RETURN RES + ROWCOUNT
	    return array(
	    	"res" => $res,
	    	"nb" => $nb
	    );
	    
	    // Close connection
	    $dbh=null;
	    
	} catch (PDOException $e) {
	    print "Error: " . $e->getMessage() . "<br/>";
	    die();
	}

}