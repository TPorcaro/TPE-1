<?php
    require_once('libs/Smarty.class.php');
    require_once('helpers/auth.helper.php');
    class UserView {

        private $smarty;
        public function __construct(){
            $authHelper = new AuthHelper();
            $userName = $authHelper->getLoggedUsername();
            $this->smarty = new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
            $this->smarty->assign('userName', $userName);
        }

        public function showPeliculas($peliculas, $generos){
            $this->smarty->assign('titulo', 'All Movies');
            $this->smarty->assign('peliculas', $peliculas);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/showPeliculas.tpl');
        }
        public function showPelicula($pelicula, $generos){
            $this->smarty->assign('titulo', $pelicula->nombre);
            $this->smarty->assign('pelicula', $pelicula);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/showPelicula.tpl');
        }
        public function showGeneros($generos){
            $this->smarty->assign('titulo', 'Generos');
            $this->smarty->assign('generos', $generos);
            $this->smarty->display("templates/showGeneros.tpl");    
        }
        public function showGenero($genero, $generos, $peliscongenero){
            $this->smarty->assign('titulo', 'Genero '.$genero->nombre);
            $this->smarty->assign('generos', $generos);
            $this->smarty->assign('genero', $genero);
            $this->smarty->assign('peliscongenero', $peliscongenero);

            $this->smarty->display("templates/showGenero.tpl");
        }
        public function showError($msgError) {
            $this->smarty->assign('titulo', 'ERROR');
            $this->smarty->assign('msgError', $msgError);
            $this->smarty->display('templates/showError.tpl');
        }
    }