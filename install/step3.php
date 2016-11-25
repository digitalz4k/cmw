<?php

function verify ($val) 
{
	if(empty($val))
		return "''";
	else
		return htmlentities($val);
}

function writeConfig ()
{
	$content = 
	'<?php
	// DATABASE CONFIGURATION
	$DB = array(
		"host" => "'.verify($_POST["host"]).'",
		"name" => "'.verify($_POST["name"]).'",
		"user" => "'.verify($_POST["user"]).'",
		"pass" => '.verify($_POST["pass"]).'
	);';

	if(file_put_contents("../server/config/config.php", $content)){
		return true;
	} else {
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
            <a href="/cmw" class="brand-logo">Installation 3/4</a>
        </div>
    </div>
 </nav>

<main>
	<div class="container">
		<div class="row center">
			<?php if(writeConfig())
				{ ?>				
				<h1 class="blue-text">Configuration file</h1>
				<p class="flow-text">Your config file is saved.<br/> Just one more step to start our webapp!</p>
				<form action="step4.php" method="POST">
					<input type="text" name="host" value="<?php echo $_POST["host"]; ?>" hidden>
					<input type="text" name="name" value="<?php echo $_POST["name"]; ?>" hidden>
					<input type="text" name="user" value="<?php echo $_POST["user"]; ?>" hidden>
					<input type="text" name="pass" value="<?php echo $_POST["pass"]; ?>" hidden>
					<input type="submit" value="Next step" class="btn btn-flat blue white-text">
				</form>				
				<?php } else {
					echo "An error occurred writing your config file. Please verify your writing rights access and try again!";
				}
			?>
		</div>
	</div>
</main>

<?php include("../server/views/partials/footer.php"); ?>

