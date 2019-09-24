<?php
    require_once('libs/Smarty.class.php');
    class UserView {

        public function showPeliculas($peliculas){
            $smarty = new Smarty();
            $smarty->assign('titulo', 'All Movies');
            $smarty->assign('peliculas', $peliculas);
            $smarty->display('templates/showPeliculas.tpl');
        }
        public function showPelicula($pelicula){
            $smarty = new Smarty();
            $smarty->assign('titulo', $pelicula->nombre);
            $smarty->assign('pelicula', $pelicula);
            $smarty->display('templates/showPelicula.tpl');
        }
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
        public function showError($msgError) {
            $smarty= new Smarty();
            $smarty->assign('titulo', 'ERROR');
            $smarty->assign('msgError', $msgError);
            $smarty->display('templates/showError.tpl');
        }
    }