<?php
    include_once('models/pelicula.model.php');
    include_once('models/genero.model.php');
    include_once('views/visitor.view.php');
    include_once('models/imagen.model.php');

    class VisitorController{
        private $modelp;
        private $modelg;
        private $view;
        private $modeli;

        public function __construct(){
            $this->modelp = new PeliculaModel();
            $this->modelg = new GeneroModel();
            $this->view = new VisitorView();
            $this->modeli= new ImagenModel();
        }
        public function showPeliculas(){
            $peliculas = $this->modelp->getAllConGenero();
            $generos= $this->modelg->getAll();
            $this->view->showPeliculas($peliculas, $generos);
        }
        public function showPelicula($params = NULL){
            $idpelicula = $params[':ID'];
            $pelicula = $this->modelp->getConGenero($idpelicula);
            $generos = $this->modelg->getAll();
            $imagenes = $this->modeli->getImgByPelicula($idpelicula);
            if($pelicula)
                $this->view->showPelicula($pelicula, $generos, $imagenes);
            else
                $this->view->showError('La id no pertenece a ninguna pelicula');
        }
        
        public function showGeneros(){
            $generos= $this->modelg->getAll();
            $this->view->showGeneros($generos);
            var_dump($generos);
        }
        public function showGenero($params = NULL){
            $idgenero = $params[':ID'];
            $genero= $this->modelg->get($idgenero);
            $generos= $this->modelg->getAll();
            $peliscongenero= $this->modelp->getPeliculaGenero($idgenero);
            if($genero)
            $this->view->showGenero($genero, $generos, $peliscongenero);
            else   
                $this->view->showError('El id no pertenece a ningun genero');
        }
        public function showError($msgError){
            $this->view->showError($msgError);
        }
    }