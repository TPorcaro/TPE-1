<?php   
    include_once('models/genero.model.php');
    include_once('models/pelicula.model.php');
    include_once('views/admin.view.php');
    include_once('views/user.view.php');
    include_once('helpers/auth.helper.php');

    class AdminController{
        private $modelp;
        private $modelg;
        private $viewa;
        private $viewu;
        private $authHelper;

        public function __construct(){
            $this->authHelper = new AuthHelper();
            $this->modelg= new GeneroModel();
            $this->modelp= new PeliculaModel();
            $this->viewa= new AdminView();
            $this->viewu= new UserView();
        }
                
        public function showPeliculas(){
            $peliculas = $this->modelp->getJoinAll();
            $this->viewu->showPeliculas($peliculas);
        }
        public function showPelicula($idpelicula){
            $pelicula = $this->modelp->get($idpelicula);
            if($pelicula)
                $this->viewu->showPelicula($pelicula);
            else
                $this->viewu->showError('La id no pertenece a ninguna pelicula');
        }
        public function showGeneros(){
            $generos= $this->modelg->getAll();
            $this->viewu->showGeneros($generos);
        }
        public function showGenero($idgenero){
            $genero= $this->modelg->get($idgenero);
            if($genero)
            $this->viewu->showGenero($genero);
            else   
                $this->viewu->showError('El id no pertenece a ningun genero');
        }
        public function addPelicula(){
            $this->authHelper->checkLogin();
            $generos= $this->modelg->getAll();
            $nombre = $_POST['nombre'];
            $duracion = $_POST['duracion'];
            $director = $_POST['director'];
            $estreno = $_POST['estreno'];
            $imagen = $_POST['imagen'];
            $descripcion = $_POST['descripcion'];
            $id_genero = $_POST['genero'];
            if (!empty($nombre) && (!empty($director)) && (!empty($id_genero))){
                $this->modelp->save($nombre, $director, $estreno, $duracion, $imagen, $descripcion, $id_genero);
                header("Location: peliculas");
            } else
            $this->viewa->showError("Faltan datos obligatorios", $generos);
        }
        public function deletePelicula($idpelicula) {
            $this->authHelper->checkLogin();
            $this->modelp->delete($idpelicula);
            header("Location: ../peliculas");
        }
        public function toEditPelicula($idpelicula){
            $this->authHelper->checkLogin();
            $pelicula = $this->modelp->get($idpelicula);
            $generos = $this->modelg->getAll();
            if($pelicula)
                $this->viewa->showToEdit($pelicula, $generos);
            else
                $this->viewu->showError('La id no pertenece a ninguna pelicula');
        }
        public function editPelicula($idpelicula){
            $this->authHelper->checkLogin();
            $nombre = $_POST['nombre'];
            $duracion = $_POST['duracion'];
            $director = $_POST['director'];
            $estreno = $_POST['estreno'];
            $imagen = $_POST['imagen'];
            $descripcion = $_POST['descripcion'];
            $id_genero = $_POST['genero'];
            if (!empty($nombre) && (!empty($director))){
                $this->modelp->update($nombre, $duracion, $director, $estreno, $imagen, $descripcion, $id_genero, $idpelicula);
               header("Location: ../peliculas");
            } else
            $this->viewu->showError("Faltan datos obligatorios");
        }
        public function addGenero(){
            $this->authHelper->checkLogin();
            $nombre= $_POST['nombre'];
            $imagen= $_POST['imagen'];
            if(!empty($nombre)){
                $this->modelg->save($nombre, $imagen);
                header('Location: generos');
            }
            else
            $this->viewu->showError("No se pudo agregar genero, falta el nombre");
        }
        public function deleteGenero($idgenero){
            $this->authHelper->checkLogin();;
            $this->modelg->delete($idgenero);
            header('Location: ../generos');
        }
        public function toEditGenero($idgenero){
            $this->authHelper->checkLogin();
            $genero = $this->modelg->get($idgenero);
            $generos = $this->modelg->getAll();
            if($genero)
            $this->viewa->showToEditGenero($genero, $generos);
            else
            $this->viewu->showError('La id no pertenece a ningun genero');
        }
        public function editGenero($idgenero){
            $this->authHelper->checkLogin();
            $nombre= $_POST['nombre'];
            $imagen= $_POST['imagen'];
            if(!empty($nombre)){
                $this->modelg->update($nombre, $imagen, $idgenero);
                header("Location: ../generos");
            }
            else
                $this->viewu->showError("Por favor  ingrese un nombre");
        }
        public function showError($msgerror){
            $generos = $this->modelg->getAll();
            $this->viewu->showError($msgerror,$generos);
        }
    }