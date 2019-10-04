    {include 'templates/header.tpl'}   
 <ul>
                {foreach $generos as $genero} 
                <li>
                Nombre: <a href="generos/{$genero->id_genero}">{$genero->nombre}</a> 
                <img class="img-genero" src="{$genero->img}" alt=" "> 
                {if isset($userName)}
                <small><a href="borrargenero/{$genero->id_genero}">ELIMINAR</a></small>
                <small><a href="paraeditargenero/{$genero->id_genero}">EDITAR</a></small>
                {/if}
                </li>
                {/foreach}
        </ul>
        {if isset($userName)}
        <div>
        <form action="nuevogenero" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre">
            <label>Imagen</label>
            <input type="text" name="imagen">
            <button type="submit">Guardar</button>
        </form>
    </div>
    {/if}
    {include 'templates/footer.tpl'} 