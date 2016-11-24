<?php include("partials/header.php"); ?>

<main class="container">
	<div id="home">
        <?php include("home.php"); ?>
    </div>
    <div id="listmovies">
        <?php include("movies/movie-list-all.php"); ?>
    </div>
    
    <div id="addmovie">
        <?php include("movies/movie-add.php"); ?>
    </div>
    
    <div id="singlemovie">
        <?php include("movies/movie-list-single.php"); ?>
    </div>
</main>

<?php include("partials/footer.php"); ?>