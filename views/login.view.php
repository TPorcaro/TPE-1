<?php
    require_once('libs/Smarty.class.php');
    require_once('helpers/auth.helper.php');
    class LoginView{
        private $smarty;
    
        public function __construct() {
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
        public function showRecovery($generos, $error = NULL){
            $this->smarty->assign('titulo', 'Recovery');
            $this->smarty->assign('error', $error);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/showRecovery.tpl');
        }
        public function newPassword($generos, $token, $error = NULL){
            $this->smarty->assign('titulo', 'NewPassword');
            $this->smarty->assign('error', $error);
            $this->smarty->assign('token', $token);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/newPassword.tpl');
        }
        public function showSended($generos, $msj){
            $this->smarty->assign('titulo', 'Sended');
            $this->smarty->assign('generos', $generos);
            $this->smarty->assign('msj', $msj);
            $this->smarty->display('templates/showSended.tpl');
        }
    }