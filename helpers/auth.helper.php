<?php
    class AuthHelper{


        public function __construct(){
        }
        public function login($user){
            session_start();

            $_SESSION['ID_USER'] = $user->id_user;
            $_SESSION['USERNAME'] = $user->username;
            $_SESSION['ADMIN']= $user->admin;
        }

        public function logout(){
            session_start();
            session_destroy();
        }

        public function checkLogin(){
            if(!isset($_SESSION['ID_USER'])){
                header('Location:' . LOGIN);
                die();
            }
        }
        public function getLoggedUsername(){
            if(session_status() != PHP_SESSION_ACTIVE)
                session_start();
            if(!isset($_SESSION['ID_USER'])){
                    return NULL;
                }
                return $_SESSION;
        }
        public function getAdmin(){
            if(session_status() != PHP_SESSION_ACTIVE)
                session_start();
            if(!isset($_SESSION['ADMIN'])){
                return NULL;
            }
            return $_SESSION['ADMIN'];
        }
        public function checkAdmin(){
           $this->checkLogin();
           if($_SESSION['ADMIN']==0){
                header('Location:'. GENEROS);
                die();
           }
        }
    }