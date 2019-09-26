<?php
    class GeneroModel{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_peliculas;charset=utf8', 'root', '');
            
        }
        public function getAll(){
            $query = $this->db->prepare('SELECT * FROM genero ORDER BY id_genero ASC');
            $query->execute();
            //var_dump($query->errorInfo()); Sirve para mirar errores SQL
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function get($idgenero){
            $query = $this->db->prepare('SELECT * FROM genero WHERE id_genero = ?');
            $query->execute(array($idgenero));
            return $query->fetch(PDO::FETCH_OBJ);
        }
        public function save($nombre, $imagen){
            $query = $this->db->prepare('INSERT INTO genero(nombre, img) VALUES (?, ?)');
            $query->execute([$nombre, $imagen]);
        }
        public function delete($idgenero){
            $query = $this->db->prepare('DELETE FROM genero WHERE id_genero = ?');
            $query->execute([$idgenero]);
        }
        public function update($nombre, $imagen, $idgenero){
            $query = $this->db->prepare('UPDATE genero SET nombre = ?, img = ? WHERE id_genero = ?');
            $query->execute([$nombre, $imagen, $idgenero]);
        }
    }