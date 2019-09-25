<?php   
    include_once('models/genero.model.php');
    include_once('models/pelicula.model.php');
    include_once('views/admin.view.php');
    include_once('views/user.view.php');

    class AdminController{
        private $modelp;
        private $modelg;
        private $viewa;
        private $viewu;

        public function __construct(){
            $this->modelg= new GeneroModel();
            $this->modelp= new PeliculaModel();
            $this->viewa= new AdminView();
            $this->viewu= new UserView();
        }
        public function showPeliculas(){
            $peliculas = $this->modelp->getAll();
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
            var_dump($genero);
        }
        public function showGenero($idgenero){
            $genero= $this->modelg->get($idgenero);
            if($genero)
            $this->viewu->showGenero($genero);
            else   
                $this->viewu->showError('El id no pertenece a ningun genero');
        }
        public function addPelicula(){

            $nombre = $_POST['nombre'];
            $duracion = $_POST['duracion'];
            $director = $_POST['director'];
            $estreno = $_POST['estreno'];
            $imagen = $_POST['imagen'];
            $descripcion = $_POST['descripcion'];
            if (!empty($nombre) && (!empty($director))){
                $this->modelp->save($nombre, $duracion, $director, $estreno, $imagen, $descripcion);
                header("Location: peliculas");
            } else
            $this->viewa->showError("Faltan datos obligatorios");
        }
        public function deletePelicula($idpelicula) {
            $this->modelp->delete($idpelicula);
            header("Location: peliculas");
        }
        public function toEditPelicula($idpelicula){
            $pelicula = $this->modelp-> get($idpelicula);
            if($pelicula)
                $this->viewa->showToEdit($pelicula);
            else
                $this->viewu->showError('La id no pertenece a ninguna pelicula');
        }
        public function editPelicula($idpelicula){
            $nombre = $_POST['nombre'];
            $duracion = $_POST['duracion'];
            $director = $_POST['director'];
            $estreno = $_POST['estreno'];
            $imagen = $_POST['imagen'];
            $descripcion = $_POST['descripcion'];
            if (!empty($nombre) && (!empty($director))){
                $this->modelp->update($nombre, $duracion, $director, $estreno, $imagen, $descripcion, $idpelicula);
               header("Location: peliculas");
            } else
            $this->viewu->showError("Faltan datos obligatorios");
        }
        public function addGenero(){
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
            $this->modelg->delete($idgenero);
            header('Location: ../generos');
        }
        public function toEditGenero($idgenero){
            $genero = $this->modelg->get($idgenero);
            if($genero)
            $this->viewa->showToEditGenero($genero);
            else
            $this->viewu->showError('La id no pertenece a ningun genero');
        }
        public function editGenero($idgenero){
            $nombre= $_POST['nombre'];
            $imagen= $_POST['imagen'];
            if(!empty($nombre)){
                $this->modelg->update($nombre, $imagen, $idgenero);
                header("Location: generos");
            }
            else
                $this->viewu->showError("Por favor  ingrese un nombre");
        }
        public function showError($msgerror){
            $this->viewu->showError($msgerror);
        }
    }