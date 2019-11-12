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
    }