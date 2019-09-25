    {include 'templates/header.tpl'}   
 <ul>
                {foreach $peliculas as $pelicula} 
                <li>
                Nombre: <a href="peliculas/{$pelicula->id_pelicula}">{$pelicula->nombre}</a> 
                ID: {$pelicula->id_pelicula} 
                <small><a href="borrarpelicula/{$pelicula->id_pelicula}">ELIMINAR</a></small>
                <small><a href="paraeditar/{$pelicula->id_pelicula}">EDITAR</a></small>
                </li>
                {/foreach}
        </ul>
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
            <select>
            {foreach $generos as $genero}
                <option value="{$genero->id_genero}" name="genero">{$genero->nombre}</option>
            {/foreach}
            </select>
            <button type="submit">Guardar</button>
        </form>
    </div>
    {include 'templates/footer.tpl'} 