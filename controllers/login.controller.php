<?php
include_once('views/login.view.php');
include_once('models/user.model.php');
include_once('models/genero.model.php');
include_once('helpers/auth.helper.php');
include_once('helpers/mail.helper.php');

    class LoginController{
        private $view;
        private $model;
        private $modelg;
        private $authHelper;
        private $mailHelper;
        
        public function __construct(){
            $this->view = new LoginView();
            $this->model = new UserModel();
            $this->modelg = new GeneroModel();
            $this->authHelper = new AuthHelper();
            $this->mailHelper = new MailHelper();
        }
        public function showLogin(){
            $generos = $this->modelg->getAll();
            $this->view->showLogin($generos);
        }
        public function showRegister(){
            $generos = $this->modelg->getAll();
            $this->view->showRegister($generos);
        }
        public function register(){
            $generos = $this->modelg->getAll();   
            $username = $_POST['user'];
            $password = $_POST['password'];
            $mail = $_POST['mail'];
            if (!empty($username) && !empty($password) && !empty($mail))  {
                $exist_user = $this->model->getByUsername($username);
                if(!$exist_user){
                    $hash= password_hash($password, PASSWORD_DEFAULT);
                    $this->model->register($username, $mail, $hash, 0);
                    $user= $this->model->getByUsername($username);
                    $this->authHelper->login($user);
                    header('Location: peliculas');
                }
                else{
                    $this->view->showRegister($generos,'User ya existente');
                }
            }
            else{
                $this->view->showRegister($generos, "Campos vacios");
            }

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
        public function showRecovery(){
        $generos = $this->modelg->getAll();
        $this->view->showRecovery($generos);
        }
        public function sendRecovery(){
            $generos = $this->modelg->getAll();  
            $username = $_POST['user'];
            $mail = $_POST['mail'];
            if (!empty($username) && !empty($mail))  {
                $exist_user = $this->model->getByUsername($username);
                if($exist_user){
                    $token = password_hash($exist_user->id_user . $mail . uniqid(), PASSWORD_DEFAULT);
                    $this->model->sendRecovery($token, $exist_user->id_user);
                    $this->mailHelper->sendMail($token, $mail, $exist_user->username);
                    $this->view->showSended($generos, "Se envio el codigo de recuperacion a su mail");
                }else{
                    $this->view->showRecovery($generos, "user o email no existentes");
                }
                }else{
                    $this->view->showRecovery($generos, "Campos vacios");
                }
        }
        public function passwordRecovery(){
            $generos = $this->modelg->getAll();
            $token = $_GET['token'];
            $user = $this->model->getByRecovery($token);
            if($user){
                $this->view->newPassword($generos, $token);
            }else{
                $this->view->showLogin($generos, "Error al recuperar la contraseña");
            }
        }
        public function resetPassword(){
            $newpass = $_POST['password'];
            $token = $_POST['token'];
            $user = $this->model->getByRecovery($token);
            
            if(!empty($newpass)){
                $hash = password_hash($newpass, PASSWORD_DEFAULT);
                $this->model->resetPassword($hash, $user->id_user);
                $this->model->deleteToken($user->id_user);
                header("Location:". LOGIN);
            }
        }

}
    