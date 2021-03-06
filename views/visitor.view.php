<?php
    require_once('libs/Smarty.class.php');
    require_once('helpers/auth.helper.php');
    class VisitorView {

        private $smarty;
        public function __construct(){
            $authHelper = new AuthHelper();
                $Sesion= $authHelper->getLoggedUsername();
                $userName = $Sesion["USERNAME"];
                $id_user = $Sesion["ID_USER"];
                $this->smarty = new Smarty();
                $admin = $authHelper->getAdmin();
                $this->smarty->assign('basehref', BASE_URL);
                $this->smarty->assign('userName', $userName);
                $this->smarty->assign('id_user', $id_user);
                $this->smarty->assign('admin', $admin);
        }

        public function showPeliculas($peliculas, $generos){
            $this->smarty->assign('titulo', 'All Movies');
            $this->smarty->assign('peliculas', $peliculas);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/showPeliculas.tpl');
        }
        public function showPelicula($pelicula, $generos, $imagenes){
            $this->smarty->assign('titulo', $pelicula->nombre);
            $this->smarty->assign('pelicula', $pelicula);
            $this->smarty->assign('imagenes', $imagenes);
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
        public function showError($msgError, $generos) {
            $this->smarty->assign('titulo', 'ERROR');
            $this->smarty->assign('generos', $generos);
            $this->smarty->assign('msgError', $msgError);
            $this->smarty->display('templates/showError.tpl');
        }
    }