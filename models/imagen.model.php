<?php
    class ImagenModel{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_peliculas;charset=utf8', 'root', '');
            
        }
        public function save($ruta, $id_pelicula){
            $query= $this->db->prepare('INSERT INTO imagen (ruta, id_pelicula_fk) VALUES(?,?)');
            $query->execute([$ruta, $id_pelicula]);
        }
        public function getImgByPelicula($idpeliculas){
            $query = $this->db->prepare('SELECT * FROM imagen WHERE id_pelicula_fk = ?');
            $query->execute([$idpeliculas]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function uploadImage($directorio, $source, $filename){
            $target_path = $directorio. uniqid() . "." . pathinfo($filename, PATHINFO_EXTENSION);
            move_uploaded_file($source, $target_path);
            return $target_path;
        }
        public function deleteByID($id_imagen){
            $query = $this->db->prepare('DELETE FROM imagen WHERE id_imagen = ?');
            $query->execute([$id_imagen]);
        }
        public function deleteByPelicula($id_pelicula){
            $query = $this->db->prepare('DELETE FROM imagen WHERE id_pelicula_fk = ?');
            $query->execute([$id_pelicula]);
            var_dump($query->errorInfo());
        }
        public function getImagen($id_imagen){
            $query = $this->db->prepare('SELECT * FROM imagen WHERE id_imagen = ?');
            $query->execute([$id_imagen]);
            return $query->fetch(PDO::FETCH_OBJ);
        }


    }