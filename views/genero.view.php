<?php

    class GeneroView{
        function showGeneros($generos){
            $smarty = new Smarty();
            $smarty->assign('titulo', 'Generos');
            $smarty->assign('generos', $generos);
            $smarty->display("templates/showGeneros.tpl");    
        }
        function showGenero($genero){
            $smarty = new Smarty();
            $smarty->assign('titulo', 'Genero ' .$genero->nombre);
            $smarty->assign('genero', $genero);
            $smarty->display("templates/showGenero.tpl");
        }
        public function showToEditGenero($pelicula){
            $smarty= new Smarty();
            $smarty->assign('titulo', 'edit'.$genero->nombre);
            $smarty->assign('genero', $genero);
            $smarty->display('templates/showToEditGenero.tpl');
        }
        function showError($msgerror){
            $smarty = new Smarty();
            $smarty->assign("titulo", "ERROR");
            $smarty->assign("msgError", $msgerror);
            $smarty->display("templates/showError.tpl");
        }
    }