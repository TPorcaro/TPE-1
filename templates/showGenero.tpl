{include 'templates/header.tpl'}  
<ul>
    <li>{$genero->nombre} 
        <ul>
            {foreach $peliscongenero as $pelicongenero }
                <li>
                <a href="peliculas/{$pelicongenero->id_pelicula} "> {$pelicongenero->nombre}</a>
                </li>
            {/foreach}
        </ul>
     </li>
</ul>
{include 'templates/footer.tpl'} 