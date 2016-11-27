<?php

function add_user ($user) 
{
	/*
	Array
	(
	    [action] => signUp
	    [first_name] => leo
	    [login] => 0782450946
	    [confirmLogin] => 0782450946
	    [password] => 1234
	    [birthdate_month] => 02
	    [birthdate_day] => 02
	    [birthdate_year] => 2015
	    [genre] => 0
	)
	*/

	$first_name = secure($user['first_name']);
	$last_name = secure($user['last_name']);
	$login = secure($user['login']);
	$confirmLogin = secure($user['login']);
	$password = secure($user['password']);
	$month = secure($user['birthdate_month']);
	$day = secure($user['birthdate_day']);
	$year = secure($user['birthdate_year']);
	$gender = secure($user['gender']);

	if($login === $confirmLogin)
	{

		$birthdate = $year . '-' . $month . '-' . $day;

		$phone_pattern = '/\+?[0-9][0-9()]{4,20}/';

		if(preg_match($phone_pattern, $login))
		{
			$login_type = 'phone';
		}
		else if(filter_var($login, FILTER_VALIDATE_EMAIL))
		{
			$login_type = 'email';
		}
		else
		{
			header("HTTP/1.0 500 Internal Server Error");
			die("Error with email or phone number.");
		}


		$sql = 'INSERT INTO users (first_name, last_name, '. $login_type .', password, birthdate, gender, user_level, created_at, modified_at)
			VALUES(?,?,?,?,?,?,?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)';

		$params = array($first_name, $last_name, $login, $password, $birthdate, $gender, 1);


		$req = db_request($sql, $params);

		if($req["nb"]>0)
		{
			header("HTTP/1.0 200 OK");
			die("User added.");
		} else {
			header("HTTP/1.0 500 Internal Server Error");
			die("Error!");
		}

	} else {
		header("HTTP/1.0 500 Internal Server Error");
		die("Error: Email or phone number inputs must be the same.");
	}

}