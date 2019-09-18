<?php
    require_once('libs/Smarty.class.php');
class PeliculaView {

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
    public function showToEdit($pelicula){
        $smarty= new Smarty();
        $smarty->assign('titulo', 'edit'.$pelicula->nombre);
        $smarty->assign('pelicula', $pelicula);
        $smarty->display('templates/showToEdit.tpl');
    }
    public function showError($msgError) {
        $smarty= new Smarty();
        $smarty->assign('titulo', 'ERROR');
        $smarty->assign('msgError', $msgError);
        $smarty->display('templates/showError.tpl');
    }
}