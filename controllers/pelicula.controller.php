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
}