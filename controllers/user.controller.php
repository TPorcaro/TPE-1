<?php
    include_once('models/pelicula.model.php');
    include_once('models/genero.model.php');
    include_once('views/user.view.php');

    class UserController{
        private $modelp;
        private $modelg;
        private $view;

        public function __construct(){
            $this->modelp = new PeliculaModel();
            $this->modelg = new GeneroModel();
            $this->view = new UserView();
        }
        public function showPeliculas(){
            $peliculas = $this->modelp->getAll();
            $generos= $this->modelg->getAll();
            $this->view->showPeliculas($peliculas, $generos);
        }
        public function showPelicula($idpelicula){
            $pelicula = $this->modelp->get($idpelicula);
            $generos = $this->modelg->getAll();
            if($pelicula)
                $this->view->showPelicula($pelicula, $generos);
            else
                $this->view->showError('La id no pertenece a ninguna pelicula');
        }
        
        public function showGeneros(){
            $generos= $this->modelg->getAll();
            $this->view->showGeneros($generos);
            var_dump($generos);
        }
        public function showGenero($idgenero){
            $genero= $this->modelg->get($idgenero);
            $generos= $this->modelg->getAll();
            if($genero)
            $this->view->showGenero($genero, $generos);
            else   
                $this->view->showError('El id no pertenece a ningun genero');
        }
        public function showError($msgError){
            $this->view->showError($msgError);
        }
        
    }