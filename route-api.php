<?php
require_once('Router.php');
require_once('./api/comentarios.api.controller.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$r = new Router();
$r->addRoute("peliculas/:ID/comentarios", "GET", "ApiController", "getComentariosByPelicula");
//$r->addRoute("comentarios", "GET", "ApiController", "getComentarios"); //?id_pelicula=5
$r->addRoute("comentarios", "POST", "ApiController", "addComentario");
$r->addRoute("comentarios/:ID", "DELETE", "ApiController", "deleteComentario");

$r->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);