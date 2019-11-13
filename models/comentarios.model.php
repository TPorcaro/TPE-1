<?php

    class ComentarioModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_peliculas;charset=utf8', 'root', '');
            
        }
        public function get($id_comentario){
            $query = $this->db->prepare('SELECT * FROM comentario WHERE id_comentario = ?');
            $query->execute([$id_comentario]);

            return $query->fetch(PDO::FETCH_OBJ);
        }
        public function getComentariosByPelicula($id_pelicula){
            $query = $this->db->prepare('SELECT * FROM comentario WHERE id_pelicula_fk = ?');
            $query->execute([$id_pelicula]);

            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function delete($id_comentario){
            $query = $this->db->prepare('DELETE FROM comentario WHERE id_comentario = ?');
            $query->execute([$id_comentario]);
        }
        public function save($cuerpo, $puntaje, $id_pelicula, $id_user){
            $query = $this->db->prepare('INSERT INTO comentario(cuerpo, puntaje, id_pelicula_fk, id_user_fk) VALUES(?,?,?,?)');
            $query->execute([$cuerpo, $puntaje, $id_pelicula, $id_user]);
            return $this->db->lastInsertId();
        }
    }