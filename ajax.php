<?php

require_once("server/components/sql/request.php");
require_once("server/controllers/movies-controller.php");
require_once("server/controllers/users-controller.php");

if($_REQUEST["action"] === "addMovie")
{
    $req = $_REQUEST;
    add($req);
}

if($_REQUEST["action"] === "listSingle")
{
    $id = $_REQUEST["id"];
    get($id);
}

if($_REQUEST["action"] === "listAll")
{
    getAll();
}

if($_REQUEST["action"] === "getCategories")
{
    get_categories();
}

if($_REQUEST["action"] === "signUp")
{
	$req = $_REQUEST;
    add_user($req);
}


?>