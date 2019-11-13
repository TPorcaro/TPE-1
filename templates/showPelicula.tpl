{include 'templates/header.tpl'} 
<div class="container">
    <div class="row">
        <div class="col-12">
            <ul>
                {$pelicula->nombre} 
                <li>
                 Director: {$pelicula->director}
                 </li>
                 <li>
                 Estreno: {$pelicula->estreno}
                 </li>
                 <li>
                 Duracion: {$pelicula->duracion}
                 </li>
                 <li>
                 Descripcion: {$pelicula->descripcion}
                 </li>
                 <li>
                 Genero: {$pelicula->genero}
                 </li>
            </ul>
        </div>
        {if $imagenes}
        <a href="deleteAllImg/{$pelicula->id_pelicula}">Borrar Todas</a>
            
        {/if}
        <div class="col-12">
                    {foreach from=$imagenes item=imagen}
                        <a  href="deleteImg/{$imagen->id_imagen}">Borrar imagen</a>
                        <img  class="img-reduc" src="{$imagen->ruta}" class="d-block w-100 h-100" alt="img">
                    {/foreach}
         </div>   
    </div>
</div>


{include 'templates/footer.tpl'} 