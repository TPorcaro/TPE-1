{include 'templates/header.tpl'}  
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
     Imagen: <img class="img-reduc" src="{$pelicula->imagen}" alt=" ">
     </li>
     <li>
     Descripcion: {$pelicula->descripcion}
     </li>
     <li>
     Genero: {$pelicula->genero}
     </li>
</ul>
{include 'templates/footer.tpl'} 