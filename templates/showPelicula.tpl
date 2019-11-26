{include 'templates/header.tpl'} 
<div class="container" data-idpelicula = "{$pelicula->id_pelicula}">
    <div class="row">
        <div class="col-12 fondo">
            <div class="contenedor"></div>
            <section class="section_container" >
                <div class="contenedor_text">
                <ul>
                {$pelicula->nombre} 
                <li>
                 Director: {$pelicula->director}
                 </li>
                 <li>
                 Estreno: 

                  {$pelicula->estreno}
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
            </section>
        </div>
        <input hidden disabled value="{$pelicula->id_pelicula}" type="text" class="idpelicula">
        {if $imagenes}
        {if $admin}
        <a href="deleteAllImg/{$pelicula->id_pelicula}">Borrar Todas</a>
        {/if}
        {/if}
        <div class="col-12">
                    {foreach from=$imagenes item=imagen}
                    {if $admin}
                        <a href="deleteImg/{$imagen->id_imagen}">Borrar imagen</a>
                    {/if}
                        <img  class="img-reduc" src="{$imagen->ruta}" class="d-block w-100 h-100" alt="img">
                    {/foreach}
         </div>
         <div class="col-md-6">
            {include 'vue/footerComentario.tpl'}
          </div>
    </div>
</div>

{include 'templates/footer.tpl'} 