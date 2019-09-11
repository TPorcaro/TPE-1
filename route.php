<?php
require_once('controllers/pelicula.controller.php');

if($_GET['accion']==''){
    $_GET['accion']=='todas';
}
$partesURL = explode('/', $_GET['accion']);

switch ($partesURL[0]){
    case 'todas':
        $controller = new PeliculaController();
        $controller->showPeliculas();
        break;
    case 'pelicula':
        $controller= new PeliculaController();
        $controller->showPelicula($partesURL[1]);
        break;
    
}

