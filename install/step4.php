<?php
require("sql_init.php");

$isReady = false;
$host = $_POST["host"];
$name = $_POST["name"];
$user = $_POST["user"];
$pass = $_POST["pass"];
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
            <a href="/cmw" class="brand-logo">Installation 4/4</a>
        </div>
    </div>
 </nav>

<main>
	<div class="container">
		<div class="row center">
			<div class="col s12">
				<pre class="center">
					<?php
					echo "Creating database <span class='blue-text'>" .$name. "</span><br/>";
					$database = create_db($name);

					$db = new PDO("mysql:dbname=$name;host=$host", $user, $pass);
					echo "Creating table <span class='blue-text'>Users</span>...<br/>";
					$users_table = create_table($users, $db);
					echo "Creating table <span class='blue-text'>Libraries</span>...<br/>";
					$libraries_table = create_table($libraries, $db);
					echo "Creating table <span class='blue-text'>Movies</span>...<br/>";
					$movies_table = create_table($movies, $db);
					echo "Database is ready...";
					$isReady = true;
					?>
				</pre>
			</div>
			
			<?php if($isReady)
				{ ?>				
			<h1 class="blue-text">Congratulations!</h1>
			<p class="flow-text">Your database is now <span class="blue-text">ready</span>.<br/> You can now start to use our amazing web application.<br/> We hope you enjoy it!</p>
			<a href="../index.php" class="btn btn-flat blue white-text">Go to homepage</a>				
			<?php } else {
				echo "An error occurred creating the database and tables. Try configure it manually: ";
			}
			?>
		</div>
	</div>
</main>

<?php include("../server/views/partials/footer.php"); ?>

