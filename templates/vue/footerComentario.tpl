{literal}
<section id="comentarios_api">
<div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Comentarios</h4>
                <button id="btn-refresco" type="button" class="btn btn-primary btn-sm">Refrescar</button>
            </div>

            <div v-if="loading" class="card-body">
                Cargando...
            </div>

            <ul v-if="!loading" class="list-group list-group-flush">
                <a v-for="comentario in comentarios" class="list-group-item list-group-item-action"> 
                
                    {{ comentario.cuerpo }} 
                     <div class="card-footer text-muted">
                        {{ comentario.username }}   {{comentario.puntaje}}
                    </div>
                    <button v-bind:name="comentario.id_comentario" class="delete">Delete</button>
                </a>
            </ul>
        </div>

       
        
</section>
{/literal}