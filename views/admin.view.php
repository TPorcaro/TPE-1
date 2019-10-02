<?php
    require_once('libs/Smarty.class.php');
    require_once('helpers/auth.helper.php');
    class AdminView{

        private $smarty;
        public function __construct(){
            $authHelper = new AuthHelper();
            $userName = $authHelper->getLoggedUsername();
            $this->smarty= new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
            $this->smarty->assign('userName', $userName); 
        }

        public function showToEdit($pelicula, $generos){
            $this->smarty->assign('titulo', 'edit'.$pelicula->nombre);
            $this->smarty->assign('pelicula', $pelicula);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/showToEdit.tpl');
        }
        public function showToEditGenero($genero, $generos){
            $this->smarty->assign('titulo', 'edit'.$genero->nombre);
            $this->smarty->assign('genero', $genero);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/showToEditGenero.tpl');
        }
        public function showError($msgerror, $generos){
            $this->smarty->assign("titulo", "ERROR");
            $this->smarty->assign("msgError", $msgerror);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display("templates/showError.tpl");
        }
    }