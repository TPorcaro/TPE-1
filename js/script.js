"use strict"
document.addEventListener("DOMContentLoaded", function(){
    let app = new Vue({
        el: "#comentarios_api",
        data: {
            title: "Lista de comentarios por CSR",
            loading: false,
            comentarios: []
        }
    });
        let idpelicula = document.querySelector(".idpelicula").value;
        document.addEventListener("load", getComentarios());
        function getComentarios(){
            app.loading = true;
            fetch("api/peliculas/"+idpelicula+"/comentarios")
            .then(response => response.json())
            .then(comentarios => {
                app.comentarios = comentarios;
                console.log("Consulta GET exitosa");
                app.loading = false;
                addEventDelete();
            })
            .catch(error => console.log('error'));
        };
        function addEventDelete(){
            let btnsborrar = document.querySelectorAll(".delete");
            console.log(btnsborrar); // queryselector no toma nuestro boton
                   for (let btnborrar of btnsborrar){
                    btnborrar.addEventListener("click",()=>deleteComent(btnborrar.name));
                }
        }
        document.querySelector("#btn-refresco").addEventListener('click', getComentarios);
        
        function deleteComent(idcomentario){
            console.log(idcomentario);
            fetch("api/comentarios"+idcomentario,{
                "method" : "DELETE"
            })
            .then(response => response.json())
            .then( comentarios => {
                console.log("Consulta DELETE exitosa");
            })
            .catch(error => console.log(error));
        };
});