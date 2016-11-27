<?php

// Location of template pages
$location = 'server/views/';

// Defined routes of the APP
$Routes = [
    'home' =>  array(
        'path' => 'home',
        'auth' => false
    ),
    'dashboard' => array(
        'path' => 'dashboard/dashboard',
        'auth' => true
    ),
    'login' => array(
        'path' => 'login',
        'auth' => false
    ),
    'logout' => array(
        'path' => 'logout',
        'auth' => true
    ),
    'activation' => array(
        'path' => 'dashboard/activation',
        'auth' => false
    ),
    'movieslist' => array(
        'path' => 'movies/movie-list-all',
        'auth' => true
    ),
    'addmovie' => array(
        'path' => 'movies/movie-add',
        'auth' => true
    ),
    'movie' => array(
        'path' => 'movies/movie-list-single',
        'auth' => true
    )
];

// GetRoute method
function getRoute ($req, $auth) {
    global $Routes;

    //DEBUG AUTH
    /*
    if($auth == true)
        echo "authed";
    else
        echo "not authed";
    */
    
    // If requested page exists in $Routes
    if (isset($Routes[$req])) {

        /*
        **  Page Access Verification
        **
        **  If page auth
        **  - redirect to login if user not authed
        **  - redirect to page requested if user authed
        **
        **  If !page auth
        **  - redirect to page requested both user authed and not authed
        */

        if($Routes[$req]["auth"] == true) {
            if(isset($_SESSION["auth"]))
                return $Routes[$req]["path"];
            else
                return $Routes["login"]["path"];
        }
        else {
            return $Routes[$req]["path"];
        }
    } else {
        return $Routes["home"];
    }    
}

/*
**  Router redirect
**
**  If !auth param => set to false (user not logged)
**  If auth param => set to true (user logged)
*/
if(isset($_GET["page"]))
    if(isset($_SESSION["auth"]))
        $page = getRoute($_GET["page"], true);
    else
        $page = getRoute($_GET["page"], false);
else
    if(isset($_SESSION["auth"]))
        $page = getRoute("home", true);
    else
        $page = getRoute("home", false);