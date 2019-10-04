    {include 'templates/header.tpl'}   
 <ul>
                {foreach $peliculas as $pelicula} 
                <li>
                Nombre: <a href="peliculas/{$pelicula->id_pelicula}">{$pelicula->nombre}</a> 
                Genero: {$pelicula->genero} 
                {if isset($userName)}
                <small><a href="borrarpelicula/{$pelicula->id_pelicula}">ELIMINAR</a></small>
                <small><a href="paraeditar/{$pelicula->id_pelicula}">EDITAR</a></small>
                {/if}
                </li>
                {/foreach}
        </ul>
        {if isset($userName)}
        <div>
        <form action="nuevapelicula" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre">
            <label>Director</label>
            <input type="text" name="director">
            <label>Estreno</label>
            <input type="text" name="estreno">
            <label>Duracion</label>
            <input type="text" name="duracion">
            <label>Imagen</label>
            <input type="text" name="imagen">
            <label>Descripcion</label>
            <input type="text" name="descripcion">
            <select name="genero">
            <option selected ></option>
            {foreach $generos as $genero}
                <option value="{$genero->id_genero}">{$genero->nombre}</option>
            {/foreach}
            </select>
            <button type="submit">Guardar</button>
        </form>
    </div>
    {/if}
    {include 'templates/footer.tpl'} 