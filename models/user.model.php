<?php

    class UserModel{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_peliculas;charset=utf8', 'root', '');
        }
        public function getByUsername($username) {
            $query = $this->db->prepare('SELECT * FROM users WHERE username = ?');
            $query->execute(array($username));
    
            return $query->fetch(PDO::FETCH_OBJ);
        }
        public function getByID($iduser) {
            $query = $this->db->prepare('SELECT * FROM users WHERE id_user = ?');
            $query->execute(array($iduser));
    
            return $query->fetch(PDO::FETCH_OBJ);
        }
        public function register($username, $mail, $password, $admin){
            $query = $this->db->prepare('INSERT INTO users(username, mail, password, admin) VALUE(?,?,?,?)');
            $query->execute([$username,$mail, $password, $admin]);
        }
        public function getUsers(){
            $query = $this->db->prepare('SELECT * FROM users ORDER BY id_user ASC');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function deleteUser($iduser){
            $query = $this->db->prepare('DELETE FROM users where id_user = ?');
            $query->execute([$iduser]);
        }
        public function darPermisos($permisos, $iduser){
            $query = $this->db->prepare('UPDATE users SET admin = ? WHERE id_user= ?');
            $query->execute([$permisos, $iduser]);
        }
    }