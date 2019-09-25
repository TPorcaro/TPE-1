<?php
require_once('controllers/admin.controller.php');
require_once('controllers/user.controller.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

if($_GET['accion']==''){
    $_GET['accion']= 'generos';
}
$partesURL = explode('/', $_GET['accion']);

switch ($partesURL[0]){
    case 'peliculas':
        $controller = new UserController();
        if(isset($partesURL[1]))
        $controller->showPelicula($partesURL[1]);
        else
        $controller->showPeliculas();
        break;
    case 'nuevapelicula':
        $controller = new AdminController();
        $controller->addPelicula();
        break;
    case 'borrarpelicula':
        $controller = new AdminController();
        $controller->deletePelicula($partesURL[1]);
        break;
    case 'paraeditar':
        $controller = new AdminController();
        $controller->toEditPelicula($partesURL[1]);
        break;
    case 'editarpelicula':
        $controller = new AdminController();
        $controller->editPelicula($partesURL[1]);
        break;
    case 'generos':
        $controller= new UserController();
        if (isset($partesURL[1]))
        $controller-> showGenero($partesURL[1]);
        else
        $controller-> showGeneros();
        break;
    case 'nuevogenero':
        $controller= new AdminController();
        $controller-> addGenero();
        break;
    case 'borrargenero':
        $controller= new AdminController();
        $controller-> deleteGenero($partesURL[1]);
        break;
    case 'paraeditargenero':
        $controller= new AdminController();
        $controller->toEditGenero($partesURL[1]);
        break;
    case 'editargenero':
        $controller= new AdminController();
        $controller-> editGenero($partesURL[1]);
        break;
        default:
        $controller= new UserController();
        $controller->showError("ERROR 404 PAGE NOT FOUND XD");
        break;
}

