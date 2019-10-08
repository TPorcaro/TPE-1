<?php
    require_once('libs/Smarty.class.php');
    require_once('helpers/auth.helper.php');
    class LoginView{
        private $smarty;
    
        public function __construct() {
            $authHelper = new AuthHelper();
            $userName = $authHelper->getLoggedUsername();
            $this->smarty = new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
            $this->smarty->assign('userName', $userName);
            
        }
        public function showLogin($generos, $error = NULL) {
            $this->smarty->assign('titulo', 'Iniciar Sesión');
            $this->smarty->assign('error', $error);
            $this->smarty->assign('generos', $generos);
            $this->smarty->assign('signin_signup', "Ingresar");
            $this->smarty->assign('ver_reg', "verify");
            $this->smarty->display('templates/login.tpl');
        }
        public function showRegister($generos, $error = NULL) {
            $this->smarty->assign('titulo', 'Registrar');
            $this->smarty->assign('error', $error);
            $this->smarty->assign('generos', $generos);
            $this->smarty->assign('signin_signup', "Registrarse");
            $this->smarty->assign('ver_reg', "verify_register");
            $this->smarty->display('templates/login.tpl');
        }
    }