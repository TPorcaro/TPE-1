<?php
include_once('models/pelicula.model.php');
include_once('views/pelicula.view.php');

class PeliculaController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new PeliculaModel();
        $this->view = new PeliculaView();
    }
    public function showPeliculas(){
        $peliculas = $this->model->getAll();
        $this->view->showPeliculas($peliculas);
    }
    public function showPelicula($idpelicula){
        $pelicula = $this->model->get($idpelicula);
        if($pelicula)
            $this->view->showPelicula($pelicula);
        else
            $this->view->showError('La id no pertenece a ninguna pelicula');
    }
    public function addPelicula(){

        $nombre = $_POST['nombre'];
        $duracion = $_POST['duracion'];
        $director = $_POST['director'];
        $estreno = $_POST['estreno'];
        $imagen = $_POST['imagen'];
        $descripcion = $_POST['descripcion'];
        if (!empty($nombre) && (!empty($director))){
            $this->model->save($nombre, $duracion, $director, $estreno, $imagen, $descripcion);
            header("Location: peliculas");
        } else
        $this->view->showError("Faltan datos obligatorios");
    }
    public function deletePelicula($idpelicula) {
        $this->model->delete($idpelicula);
        header("Location: ../peliculas");
    }
}