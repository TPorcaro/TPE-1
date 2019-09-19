<?php
    class GeneroModel{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_peliculas;charset=utf8', 'root', '');
        }
        public function getAll(){
            $query = $this->db->prepare('SELECT * FROM generos ORDER BY id_genero_fk ASC');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function get($idgenero){
            $query = $this->db->prepare('SELECT * FROM generos WHERE id_genero_fk = ?');
            $query->execute(array($idgenero));
            return $query->fetch(PDO::FETCH_OBJ);
        }
        public function save($nombre, $imagen){
            $query = $this->db->prepare('INSERT INTO generos(nombre, imagen) VALUES (?, ?)');
            $query->execute([$nombre, $imagen]);
        }
        public function delete($idgenero){
            $query = $this->db->prepare('DELETE FROM generos WHERE id_genero_fk = ?');
            $query->execute([$idgenero]);
        }
        public function update($nombre, $imagen, $idgenero){
            $query = $this->db->prepare('UPDATE genero SET nombre = ?, imagen = ? WHERE id_genero_fk = ?');
            $query->execute([$nombre, $imagen]);
        }
    }