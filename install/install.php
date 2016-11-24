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
            <a href="/cmw" class="brand-logo">Installation 1/3</a>
        </div>
    </div>
 </nav>

<main>
	<div class="container">
		<div class="center">
			<h1 class="blue-text">Configuration required</h1>

			<p class="flow-text">We gonna help you to configure and test your database connection. Ready?</p>
		</div>
		<div class="row">
		<form action="step2.php" method="POST" class="col s6 offset-s3 center">
			
			<div class="input-field col s12">
				<label for="host">URI of your database</label>
				<input type="text" name="host" placeholder="127.0.0.1">
			</div>	
			<div class="input-field col s12">	
				<label for="name">Name of your database</label>
				<input type="text" name="name" placeholder="cmw">
			</div>
			<div class="input-field col s12">
				<label for="user">Login to connect with</label>
				<input type="text" name="user" placeholder="root">
			</div>
			<div class="input-field col s12">
				<label for="pass">Password to connect with</label>
				<input type="text" name="pass" placeholder="Can be empty...">
			</div>
			<input type="submit" value="Next step" class="btn btn-flat blue white-text">
		</form>
		</div>
	</div>
</main>

<?php include("../server/views/partials/footer.php"); ?>