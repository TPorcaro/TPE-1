<?php
require_once('controllers/pelicula.controller.php');

if($_GET['accion']==''){
    $_GET['accion']= 'peliculas';
}
$partesURL = explode('/', $_GET['accion']);

switch ($partesURL[0]){
    case 'peliculas':
        $controller = new PeliculaController();
        if(isset($partesURL[1]))
        $controller->showPelicula($partesURL[1]);
        else
        $controller->showPeliculas();
        break;
    case 'pelicula':
        $controller= new PeliculaController();
        $controller->showPelicula($partesURL[1]);
        break;
    case 'nuevapelicula':
        $controller = new PeliculaController();
        $controller->addPelicula();
        break;
    case 'borrarpelicula':
        $controller = new PeliculaController();
        $controller->deletePelicula($partesURL[1]);
        break;
    case 'paraeditar':
        $controller = new PeliculaController();
        $controller->toEditPelicula($partesURL[1]);
        break;
    case 'editarpelicula':
        $controller = new PeliculaController();
        $controller->editPelicula($partesURL[1]);
        break;
        default:
        echo "<h1>Error 404 - Page not found </h1>";
        break;
}

