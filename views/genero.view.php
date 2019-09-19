<?php

    class GeneroView{
        public function showGeneros($generos){
            $smarty = new Smarty();
            $smarty->assign('titulo', 'Generos');
            $smarty->assign('generos', $generos);
            $smarty->display("templates/showGeneros.tpl");    
        }
        public function showGenero($genero){
            $smarty = new Smarty();
            $smarty->assign('titulo', 'Genero '.$genero->nombre);
            $smarty->assign('genero', $genero);
            $smarty->display("templates/showGenero.tpl");
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