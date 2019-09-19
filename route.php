<?php
require_once('controllers/pelicula.controller.php');
require_once('controllers/genero.controller.php');

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
    case 'generos':
        $controller= new GeneroController();
        if (isset($partesURL[1]))
        $controller-> showGenero($partesURL[1]);
        else
        $controller-> showGeneros();
        break;
    case 'nuevogenero':
        $controller= new GeneroController();
        $controller-> addGenero();
        break;
    case 'borrargenero':
        $controller= new GeneroController();
        $controller-> deleteGenero($partesURL[1]);
        break;
    case 'paraeditargenero':
        $controller= new GeneroController();
        $controller->toEditGenero($partesURL[1]);
        break;
    case 'editargenero':
        $controller= new GeneroController();
        $controller-> editGenero($partesURL[1]);
        break;
        default:
        $controller= new PeliculaController();
        $controller->showError("ERROR 404 PAGE NOT FOUND XD");
        break;
}

