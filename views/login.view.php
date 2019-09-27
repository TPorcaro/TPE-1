<?php
    require_once('libs/Smarty.class.php');
    class LoginView{
        private $smarty;

        public function __construct() {
            $this->smarty = new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
        }
        public function showLogin($generos, $error = NULL) {
            $this->smarty->assign('titulo', 'Iniciar Sesión');
            $this->smarty->assign('error', $error);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/login.tpl');
        }
    }