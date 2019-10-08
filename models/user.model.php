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
        public function register($username, $password){
            $query = $this->db->prepare('INSERT INTO users(username, password) VALUE(?,?)');
            $query->execute([$username, $password]);
        }
    
    }