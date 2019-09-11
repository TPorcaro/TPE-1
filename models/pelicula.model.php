<?php

class PeliculaModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_peliculas;charset=utf8', 'root', '');
    }
    public function getAll(){
        $query = $this->db->prepare('SELECT * FROM peliculas ORDER BY id_pelicula ASC');
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function get($idpelicula){
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id_pelicula = ?');
        $query-> execute($idpelicula);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}