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
                 Imagen: <img class="img-reduc" src="{$pelicula->imagen}" alt=" ">
                 </li>
                 <li>
                 Descripcion: {$pelicula->descripcion}
                 </li>
                 <li>
                 Genero: {$pelicula->genero}
                 </li>
            </ul>
        </div>
        <div class="col-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                    <div class="carousel-item active ">
                    {*<img src="img/5dc97de2a8ab3.png" class="d-block w-100 h-100" alt="img">*}
                    </div>
                    {foreach from=$imagenes item=imagen }
                        <div class="carousel-item">
                        <img src="{$imagen->ruta}" class="d-block w-100 h-100" alt="img">
                    </div>
                    {/foreach}
                    
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                    </div>
        </div>
    </div>
</div>


{include 'templates/footer.tpl'} 