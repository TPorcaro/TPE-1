<?php   
    include_once('models/genero.model.php');
    include_once('views/genero.view.php');

    class GeneroController{
        private $model;
        private $view;

        public function __construct(){
            $this->model= new GeneroModel();
            $this->view= new GeneroView();
        }
        public function showGeneros(){
            $generos= $this->model->getAll();
            $this->view->showGeneros($generos);
        }
        public function showGenero($idgenero){
            $genero= $this->model->get($idgenero);
            if($genero)
            $this->view->showGenero($idgenero);
            else   
                $this->view->showError('El id no pertenece a ningun genero');
        }
        public function addGenero(){
            $nombre= $_POST['nombre'];
            $descripcion= $_POST['descripcion'];
            $imagen= $_POST['imagen'];
            if(!empty($nombre)){
                $this->model->save($nombre, $descripcion, $imagen);
                header('Location: generos');
            }
            else
            $this->view->showError("No se pudo agregar genero, falta el nombre");
        }
        public function deleteGenero($idgenero){
            $this->model->delete($idgenero);
            header('Location: generos');
        }
        public function toEditGenero($idgenero){
            $genero = $this->model->get($idgenero);
            if($genero)
            $this->view->toEditGenero($genero);
            else
            $this->view->showError('La id no pertenece a ningun genero');
        }

    }