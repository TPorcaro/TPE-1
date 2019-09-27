<?php
include_once('views/login.view.php');
include_once('models/user.model.php');
include_once('models/genero.model.php');
    class LoginController{
        private $view;
        private $model;
        private $modelg;
        
        public function __construct(){
            $this->view = new LoginView();
            $this->model = new UserModel();
            $this->modelg = new GeneroModel();

        }
        public function showLogin(){
            $generos= $this->modelg->getAll();
            $this->view->showLogin($generos);
        }
        public function verifyUser(){
            $generos= $this->modelg->getAll();

            $username = $_POST['user'];
            $password = $_POST['password'];

            $user = $this->model->getByUsername($username);
            var_dump($user);
            if (isset($user) && password_verify($password, $user->password)) {
                session_start();  
                $_SESSION['user'] = $username;
                $_SESSION['id_user'] = $user->id_user;
                header('Location : ../generos');
            } else {
            $this->view->showLogin($generos, "Login incorrecto");
        }

        }
        public function logout() {
            session_start();
            session_destroy();
            header('Location: generos');
        }
    }
    