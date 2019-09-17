<?php

class PeliculaView {

    public function showPeliculas($peliculas){
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css\css-boostrap-4.3.1\bootstrap.min.css">
            <title>All movies</title>
        </head>
        <body>
            <ul>';
                foreach ($peliculas as $pelicula) {
                    $html.= '<li>Nombre: <a href="peliculas/'.$pelicula->id_pelicula.'">'.$pelicula->nombre.'</a> ID: '.$pelicula->id_pelicula.' <small><a href="borrarpelicula/'.$pelicula->id_pelicula.'">ELIMINAR</a></small><small><a href="paraeditar/'.$pelicula->id_pelicula.'"> EDITAR</a></small></li>';
                }
        $html.= 
        '</ul>
        <div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="js\js-boostrap-4.3.1\bootstrap.min.js"</script>
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
            <link rel="stylesheet" href="..\css\css-boostrap-4.3.1\bootstrap.min.css">
            <title>Pelicula</title>
        </head>
        <body>
            <ul>';
            $html.='<li>'.$pelicula->nombre. ' ID: '.$pelicula->id_pelicula;
        $html.= '
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="..\js\js-boostrap-4.3.1\bootstrap.min.js"</script>
        </body>
        </html>';
        echo $html;
    }
    public function showToEdit($pelicula){
            $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="stylesheet" href="..\css\css-boostrap-4.3.1\bootstrap.min.css" >
                <title>Pelicula</title>
            </head>
            <body>
                <ul>';
                $html.='<li>'.$pelicula->nombre. ' ID: '.$pelicula->id_pelicula;
            $html.= '
            <form action="../editarpelicula/'.$pelicula->id_pelicula.'" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre" value="'.$pelicula->nombre.'">
            <label>Duracion</label>
            <input type="text" name="duracion" value="'.$pelicula->duracion.'">
            <label>Director</label>
            <input type="text" name="director" value="'.$pelicula->director.'">
            <label>Estreno</label>
            <input type="text" name="estreno" value="'.$pelicula->estreno.'">
            <label>Imagen</label>
            <input type="text" name="imagen" value="'.$pelicula->imagen.'">
            <label>Descripcion</label>
            <input type="text" name="descripcion" value="'.$pelicula->descripcion.'">
            <button type="submit" name="editar" value="'.$pelicula->id_pelicula.'">EDITAR</button>
        </form>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="..\js\js-boostrap-4.3.1\bootstrap.min.js"</script>
            </body>
            </html>';
            echo $html;
        
    }
    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }
}