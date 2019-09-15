<?php

class PeliculaView {

    public function showPeliculas($peliculas){
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <title>All movies</title>
        </head>
        <body>
            
            <ul>';
                foreach ($peliculas as $pelicula) {
                    $html.= '<li>Nombre: '.$pelicula->nombre.' ID: '.$pelicula->id_pelicula.' <small><a href="borrarpelicula/'.$pelicula->id_pelicula.'">ELIMINAR</a></li>';
                }
        $html.= 
        '<div>
        <form action="nuevapelicula" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre">
            <label>Duracion</label>
            <input type="text" name="duracion">
            <label>Director</label>
            <input type="text" name="director">
            <label>Estreno</label>
            <input type="text" name="estreno">
            <label>Imagen</label>
            <input type="text" name="imagen">
            <label>Descripcion</label>
            <input type="text" name="descripcion">
            <button type="submit">Guardar</button>
        </form>
    </div>
        </body>
        </html>';
        echo $html;
    }
    public function showPelicula($pelicula){
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <title>Pelicula</title>
        </head>
        <body>
            <ul>';
            $html.='<li>'.$pelicula->nombre. ' ID: '.$pelicula->id_pelicula;
        $html.= '</body>
        </html>';
        echo $html;
    }
    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }
}