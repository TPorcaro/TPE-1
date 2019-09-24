<?php
    require_once('libs/Smarty.class.php');
    class AdminView{
        public function showToEdit($pelicula){
            $smarty= new Smarty();
            $smarty->assign('titulo', 'edit'.$pelicula->nombre);
            $smarty->assign('pelicula', $pelicula);
            $smarty->display('templates/showToEdit.tpl');
        }
        public function showToEditGenero($genero){
            $smarty= new Smarty();
            $smarty->assign('titulo', 'edit'.$genero->nombre);
            $smarty->assign('genero', $genero);
            $smarty->display('templates/showToEditGenero.tpl');
        }
        public function showError($msgerror){
            $smarty = new Smarty();
            $smarty->assign("titulo", "ERROR");
            $smarty->assign("msgError", $msgerror);
            $smarty->display("templates/showError.tpl");
        }
    }