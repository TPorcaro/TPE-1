 {include 'templates/header.tpl'}
<ul>
            <li>    {$pelicula->nombre} 
                    ID: {$pelicula->id_pelicula}
            </li>
            </ul>
            <form action="editarpelicula/{$pelicula->id_pelicula}" method="POST" enctype="multipart/form-data">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{$pelicula->nombre}">
            <label>Director</label>
            <input type="text" name="director" value="{$pelicula->director}">
            <label>Estreno</label>
            <input type="text" name="estreno" value="{$pelicula->estreno}">
            <label>Duracion</label>
            <input type="text" name="duracion" value="{$pelicula->duracion}">
            <label>Descripcion</label>
            <input type="text" name="descripcion" value="{$pelicula->descripcion}">
            <label>Genero</label>
            <select name="genero" id="genero">
            <option selected></option>
            {foreach $generos as $genero}
                <option value="{$genero->id_genero}" name="genero">{$genero->nombre}</option>
            {/foreach}
            </select>
             <label>Imagenes</label>
            <input type="file" name="imagenes[]" accept=".jpg, .png, .jpeg" multiple="">
            <button type="submit" name="editar" value="{$pelicula->id_pelicula}">EDITAR</button>
            </form>
 {include 'templates/footer.tpl'}