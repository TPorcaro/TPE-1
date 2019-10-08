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
    public function getConGenero($idpelicula){
        $query = $this->db->prepare('SELECT peliculas.id_pelicula, peliculas.nombre, peliculas.director, peliculas.estreno, peliculas.duracion, peliculas.imagen,
        peliculas.descripcion, genero.nombre AS genero FROM peliculas JOIN genero ON peliculas.id_genero_fk=genero.id_genero WHERE peliculas.id_pelicula=?');
        $query->execute([$idpelicula]);
        
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getAllConGenero(){
        $query = $this->db->prepare('SELECT peliculas.id_pelicula, peliculas.nombre, peliculas.director, peliculas.estreno, peliculas.duracion, peliculas.imagen,
        peliculas.descripcion, genero.nombre AS genero FROM peliculas JOIN genero ON peliculas.id_genero_fk=genero.id_genero');
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getPeliculaGenero($id_genero){
        $query= $this->db->prepare('SELECT * FROM peliculas WHERE id_genero_fk = ?');
        $query-> execute([$id_genero]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function save($nombre, $director, $estreno, $duracion, $imagen, $descripcion, $id_genero){
        $query= $this->db->prepare('INSERT INTO peliculas(nombre, director, estreno, duracion, imagen, descripcion, id_genero_fk) VALUES (?,?,?,?,?,?,?)');
        $query->execute([$nombre, $director, $estreno, $duracion, $imagen, $descripcion, $id_genero]);
    }
    public function delete($idpelicula){
        $query = $this->db->prepare('DELETE FROM peliculas where id_pelicula = ?');
        $query->execute([$idpelicula]);
    }
    public function update($nombre, $director, $estreno, $duracion, $imagen, $descripcion, $id_genero, $idpelicula){
        $query = $this->db->prepare('UPDATE peliculas SET nombre=? , director=?, estreno=?, duracion=?, imagen=?, descripcion=?, id_genero_fk=? WHERE id_pelicula =?');
        $query->execute(array($nombre, $director, $estreno, $duracion, $imagen, $descripcion, $id_genero, $idpelicula));
        //var_dump($query->errorinfo());
    }
}