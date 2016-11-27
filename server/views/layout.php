<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinema Management Webapp</title>
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/css/styles.css" type="text/css" />
</head>
<body>

<?php include("partials/header.php"); ?>
<main class="container">    
    <?php include("$page.php"); ?>
</main>
<?php include("partials/footer.php"); ?>

<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="application/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script type="text/javascript" src="public/assets/js/accounts.js"></script>
<script type="text/javascript" src="public/assets/js/movies.js"></script>
<script type="text/javascript" src="public/assets/js/app.js"></script>
</body>
</html>