<?php

function getAll () 
{
    $sql = "SELECT _id, title, producer, year_of_prod, poster_url FROM movies";

    $req = db_request($sql, null);

    if($req["nb"] > 0) {
        // Response
        header("HTTP/1.0 200 OK");
        echo json_encode($req["res"]);
    } else {
        header("HTTP/1.0 500 Internal Server Error");
        die("Aucun film à afficher pour l'instant.");
    }
}

function get ($id)
{
    $sql = "SELECT * FROM movies WHERE _id LIKE ?";          
    $params = array($id);

    $req = db_request($sql, $params);

    if($req["nb"] > 0) {
        // Response
        header("HTTP/1.0 200 OK");
        echo json_encode($req["res"][0]);
    } else {
        header("HTTP/1.0 500 Internal Server Error");
        die("Error: Movie not found.");
    }
}

function add ($req)
{
    $title = secure($req["titre"]);
    $director = secure($req["real"]);
    $producer = secure($req["prod"]);
    $actors = secure($req["actors"]);
    $storyline = secure($req["synop"]);
    $video = secure($req["ba"]);
    $category = secure($req["movie_category"]);
    $year_of_prod = secure($req["movie_annee"]);
    $language = secure($req["movie_langue"]);
    //$poster_url = secure($req["poster_url"]);
    $poster_url = "poster-sample.jpg";
    //$shelf_id = secure($req["shelf_id"]);

    $sql = "INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video, created_at, modified_at, poster_url) 
        VALUES(?,?,?,?,?,?,?,?,?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, ?)";
    $params = array($title, $actors, $director, $producer, $year_of_prod, $language, $category, $storyline, $video, $poster_url);

    $req = db_request($sql, $params); 

    if($req["nb"] > 0) {
        // Response
        header("HTTP/1.0 201 OK");
        die("Movie successfully added to your library.");
    } else {
        header("HTTP/1.0 500 Internal Server Error");
        die("Error while adding your movie. Please try again.");
    }
}