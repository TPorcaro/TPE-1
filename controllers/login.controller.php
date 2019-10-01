<?php
include_once('views/login.view.php');
include_once('models/user.model.php');
include_once('models/genero.model.php');
include_once('helpers/auth.helper.php');
    class LoginController{
        private $view;
        private $model;
        private $modelg;
        private $authHelper;
        
        public function __construct(){
            $this->view = new LoginView();
            $this->model = new UserModel();
            $this->modelg = new GeneroModel();
            $this->authHelper = new AuthHelper();
        }
        public function showLogin(){
            $generos = $this->modelg->getAll();
            $this->view->showLogin($generos);
        }
        public function verifyUser(){
            $generos = $this->modelg->getAll();
            
            $username = $_POST['user'];
            $password = $_POST['password'];

            $user = $this->model->getByUsername($username);
            if (!empty($username) && !empty($password)) {
                if ($user && password_verify($password, $user->password)) {
                    $this->authHelper->login($user);
                    header('Location: generos');
                } else {
                    $this->view->showLogin($generos, "Login incorrecto");
                }
            }
            else
                $this->view->showLogin($generos, "Campos vacios");

        }
        public function logout() {
            $this->authHelper->logout();
            header('Location: generos');
        }
    }
    