 {include 'templates/header.tpl'}
<ul>
            <li>    {$pelicula->nombre} 
                    ID: {$pelicula->id_pelicula}
            </li>
            </ul>
            <form action="editarpelicula/{$pelicula->id_pelicula}" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{$pelicula->nombre}">
            <label>Duracion</label>
            <input type="text" name="duracion" value="{$pelicula->duracion}">
            <label>Director</label>
            <input type="text" name="director" value="{$pelicula->director}">
            <label>Estreno</label>
            <input type="text" name="estreno" value="{$pelicula->estreno}">
            <label>Imagen</label>
            <input type="text" name="imagen" value="{$pelicula->imagen}">
            <label>Descripcion</label>
            <input type="text" name="descripcion" value="{$pelicula->descripcion}">
            <button type="submit" name="editar" value="{$pelicula->id_pelicula}">EDITAR</button>
            </form>
 {include 'templates/footer.tpl'}