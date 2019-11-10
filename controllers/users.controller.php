<?php
    require_once('helpers/auth.helper.php');
    require_once('models/user.model.php');
    include_once('models/genero.model.php');
    require_once('views/users.view.php');
    class UsersController{
        private $authHelper;
        private $modelu;
        private $modelg;
        private $view;

        public function __construct(){
            $this->authHelper = new AuthHelper();
            $this->modelu = new UserModel();
            $this->modelg = new GeneroModel();
            $this->view= new UsersView();
            $this->authHelper->checkAdmin();
        }
        public function showUsers(){
            $users= $this->modelu->getUsers();
            $generos= $this->modelg->getAll();
            $this->view->showUsers($users, $generos);
        }
    }