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
        public function deleteUser($params=NULL){
            $iduser = $params[':ID'];
            $generos= $this->modelg->getAll();
            $user= $this->modelu->getByID($iduser);
            if($user->admin!=0){
                $this->view->showError('ERROR: Imposible borrar a un admin', $generos);
                die();
            }
            $this->modelu->deleteUser($iduser);
            header("Location: ../users");
        }
        public function darPermisos($params=NULL){
            $iduser= $params[':ID'];
            $generos= $this->modelg->getAll();
            $user= $this->modelu->getByID($iduser);
            if($user->admin!=0){
                $this->modelu->darPermisos(0, $iduser);
            }else{
                $this->modelu->darPermisos(1, $iduser);
            }
            header("Location: ../users");
        }
    }