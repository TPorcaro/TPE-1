<?php
require_once('controllers/admin.controller.php');
require_once('controllers/visitor.controller.php');
require_once('controllers/login.controller.php');
require_once('controllers/users.controller.php');
require_once('Router.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", BASE_URL . 'login');
if($_GET['accion']==''){
    $_GET['accion']= 'generos';
}
$r= new Router();

$r->addRoute("login","GET","LoginController", "showLogin");
$r->addRoute("register","GET","LoginController", "showRegister");
$r->addRoute("verify_register","POST","LoginController", "register");
$r->addRoute("verify","POST","LoginController", "verifyUser");
$r->addRoute("logout","GET","LoginController", "logout");
$r->addRoute("peliculas","GET","VisitorController", "showPeliculas");
$r->addRoute("peliculas/:ID","GET","VisitorController", "showPelicula");
$r->addRoute("nuevapelicula","POST","AdminController", "addPelicula");
$r->addRoute("borrarpelicula/:ID","GET","AdminController", "deletePelicula");
$r->addRoute("paraeditar/:ID","GET","AdminController", "ToEditPelicula");
$r->addRoute("editarpelicula/:ID","POST","AdminController", "editPelicula");
$r->addRoute("generos","GET","VisitorController", "showGeneros");
$r->addRoute("generos/:ID","GET","VisitorController", "showGenero");
$r->addRoute("nuevogenero","POST","AdminController", "addGenero");
$r->addRoute("borrargenero/:ID","GET","AdminController", "deleteGenero");
$r->addRoute("paraeditargenero/:ID","GET","AdminController", "toEditGenero");
$r->addRoute("editargenero/:ID","POST","AdminController", "editGenero");
$r->addRoute("users","GET","UsersController", "showUsers");
$r->addRoute("borraruser/:ID","GET","UsersController", "deleteUser");
$r->addRoute("darpermiso/:ID","GET","UsersController", "darPermisos");
$r->addRoute("deleteImg/:ID","GET","AdminController", "deleteImg");
$r->addRoute("deleteAllImg/:ID","GET","AdminController", "deleteAllImgByPelicula");
$r->addRoute("showRecovery","GET","LoginController", "showRecovery");
$r->addRoute("send_recovery","POST","LoginController", "sendRecovery");
$r->addRoute("password_recovery","GET","LoginController", "passwordRecovery");
$r->addRoute("reset_password","POST","LoginController", "resetPassword");
$r->setDefaultRoute("VisitorController", "showGeneros");

$r->route($_GET['accion'], $_SERVER['REQUEST_METHOD']); 




/*$partesURL = explode('/', $_GET['accion']);

switch ($partesURL[0]){
    case 'login':
        $controller = new LoginController();
        $controller->showLogin();
        break;
    case 'verify':
        $controller = new LoginController();
        $controller->verifyUser();
        break;
    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;
    case 'peliculas':
        $controller = new VisitorController();
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
        $controller= new VisitorController();
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
        $controller= new VisitorController();
        $controller->showError("ERROR 404 PAGE NOT FOUND XD");
        break;
}*/