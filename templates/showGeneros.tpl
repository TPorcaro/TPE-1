    {include 'templates/header.tpl'}   
 <ul>
                {foreach $generos as $genero} 
                <li>
                Nombre: <a href="generos/{$genero->id_genero}">{$genero->nombre}</a> 
                ID: {$genero->id_genero} 
                <small><a href="borrargenero/{$genero->id_genero}">ELIMINAR</a></small>
                <small><a href="paraeditargenero/{$genero->id_genero}">EDITAR</a></small>
                </li>
                {/foreach}
        </ul>
        <div>
        <form action="nuevogenero" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre">
            <label>Imagen</label>
            <input type="text" name="imagen">
            <button type="submit">Guardar</button>
        </form>
    </div>
    {include 'templates/footer.tpl'} 