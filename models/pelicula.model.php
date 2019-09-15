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
        $query->execute(array($idpelicula));

        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function save($nombre, $duracion, $director, $estreno, $imagen, $descripcion){
        print_r($nombre);
        print_r($director);
        $query= $this->db->prepare('INSERT INTO peliculas(nombre, duracion, director, estreno, imagen, descripcion) VALUES (?,?,?,?,?,?)');
        $query->execute([$nombre, $duracion, $director, $estreno, $imagen, $descripcion]);
    }
    public function delete($idpelicula){
        $query = $this->db->prepare('DELETE FROM peliculas where id_pelicula = ?');
        $query->execute([$idpelicula]);
    }
}