<?php
require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');

    class UsersView{
        
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
        public function showUsers($users, $generos){
            $this->smarty->assign('titulo', 'All Users');
            $this->smarty->assign('users', $users);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/showUsers.tpl');
        }
        public function showError($msgError, $generos){
            $this->smarty->assign('titulo', 'Error');
            $this->smarty->assign('msgError', $msgError);
            $this->smarty->assign('generos', $generos);
            $this->smarty->display('templates/showError.tpl');
        }
    }