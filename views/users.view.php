<?php
require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');

    class UsersView{
        
        private $smarty;
            public function __construct(){
                $authHelper = new AuthHelper();
                $userName = $authHelper->getLoggedUsername();
                $this->smarty = new Smarty();
                $this->smarty->assign('basehref', BASE_URL);
                $this->smarty->assign('userName', $userName);
        }
        public function showUsers($users, $generos){
            $this->smarty->assign('titulo', 'All Movies');
            $this->smarty->assign('users', $users);
            $this->smarty->display('templates/showUsers.tpl');
        }
    }