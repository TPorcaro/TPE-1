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
            <title>Document</title>
        </head>
        <body>
            <div>
                <form action="nuevapelicula" method="get">
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
                </form>
            </div>
            <ul>';
                foreach ($peliculas as $pelicula) {
                    $html.= '<li>Nombre: '.$pelicula->nombre.'</li>';
                }
        $html.= '</body>
        </html>';
        echo $html;
    }
}