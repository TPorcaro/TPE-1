<?php
require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');

    class UsersView{
        
        private $smarty;
            public function __construct(){
                $authHelper = new AuthHelper();
                $userName = $authHelper->getLoggedUsername();
                $this->smarty = new Smarty();
                $admin = $authHelper->getAdmin();
                $this->smarty->assign('basehref', BASE_URL);
                $this->smarty->assign('userName', $userName);
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