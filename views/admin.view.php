<?php
    require_once('libs/Smarty.class.php');
    class AdminView{

        private $smarty;
        public function __construct(){
            $this->smarty= new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
        }

        public function showToEdit($pelicula){
            $this->smarty->assign('titulo', 'edit'.$pelicula->nombre);
            $this->smarty->assign('pelicula', $pelicula);
            $this->smarty->display('templates/showToEdit.tpl');
        }
        public function showToEditGenero($genero){
            $this->smarty->assign('titulo', 'edit'.$genero->nombre);
            $this->smarty->assign('genero', $genero);
            $this->smarty->display('templates/showToEditGenero.tpl');
        }
        public function showError($msgerror){
            $this->smarty->assign("titulo", "ERROR");
            $this->smarty->assign("msgError", $msgerror);
            $this->smarty->display("templates/showError.tpl");
        }
    }