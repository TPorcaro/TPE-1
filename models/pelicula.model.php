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
    public function getPeliculaGenero($id_genero){
        $query= $this->db->prepare('SELECT * FROM peliculas WHERE id_genero_fk = ?');
        $query-> execute([$id_genero]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function save($nombre, $duracion, $director, $estreno, $imagen, $descripcion, $id_genero){
        $query= $this->db->prepare('INSERT INTO peliculas(nombre, duracion, director, estreno, imagen, descripcion, id_genero_fk) VALUES (?,?,?,?,?,?,?)');
        $query->execute([$nombre, $duracion, $director, $estreno, $imagen, $descripcion, $id_genero]);
    }
    public function delete($idpelicula){
        $query = $this->db->prepare('DELETE FROM peliculas where id_pelicula = ?');
        $query->execute([$idpelicula]);
    }
    public function update($nombre, $duracion, $director, $estreno, $imagen, $descripcion, $id_genero, $idpelicula){
        $query = $this->db->prepare('UPDATE peliculas SET nombre=? , duracion=?, director=?, estreno=?, imagen=?, descripcion=?, id_genero_fk=? WHERE id_pelicula =?');
        $query->execute(array($nombre, $duracion, $director, $estreno, $imagen, $descripcion, $id_genero, $idpelicula));
        //var_dump($query->errorinfo());
    }
}