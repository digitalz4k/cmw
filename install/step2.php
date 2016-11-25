<?php

	function verify ($val) 
	{
		if(empty($val))
			return "''";
		else
			return htmlentities($val);
	}

	function testConfig () 
	{
		try{
			if(isset($_POST["host"]))
			{
				$host = verify($_POST["host"]);
				$name = verify($_POST["name"]);
				$user = verify($_POST["user"]);
				$pass = $_POST["pass"];
			} else {
				$host = '127.0.0.1';
				$name = '';
				$user = 'root';
				$pass = '';
			}

		    $dbh = new pdo( 'mysql:host='.$host.'', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		    $dbh = null;

		   	return true;
		}
		catch(PDOException $ex){
		   return false;
		}
	}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinema Management Webapp</title>
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/assets/css/styles.css" type="text/css" />
</head>
<body>

<nav class="blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/cmw" class="brand-logo">Installation 2/4</a>
        </div>
    </div>
 </nav>

<main>
	<div class="container">
		<div class="center">
			<h1 class="blue-text">Database connection</h1>
		</div>
		<div class="row center">
		
			<?php if(testConfig()) 
			{ ?>

				<h5>Connection status: <b style='color: green;'>OK</b></h5>
		    
			    <ul>
			    	<li>Host: <span class="blue-text"><?php echo $_POST["host"]; ?></span></li>
			    	<li>Database name: <span class="blue-text"><?php echo $_POST["name"]; ?></span></li>
			    	<li>User: <span class="blue-text"><?php echo $_POST["user"]; ?></span></li>
			    	<li>Password: <span class="blue-text"><?php echo $_POST["pass"]; ?></span></li>
				</ul>
		    
				<form action="step3.php" method="POST">
					<input type="text" name="host" value="<?php echo $_POST["host"]; ?>" hidden>
					<input type="text" name="name" value="<?php echo $_POST["name"]; ?>" hidden>
					<input type="text" name="user" value="<?php echo $_POST["user"]; ?>" hidden>
					<input type="text" name="pass" value="<?php echo $_POST["pass"]; ?>" hidden>
					<input type="submit" value="Next step" class="btn btn-flat blue white-text">
				</form>
			<?php
			} else { ?>
				<h5>Connection status: <b style='color: red;'>FAILED</b></h5>
			    <p class="flow-text">Please verify your informations and try again.</p>
			    <a href='install.php' class="btn btn-flat red white-text">Back</a>
			<?php }
			?>


		</div>
	</div>
</main>

<?php include("../server/views/partials/footer.php"); ?>	