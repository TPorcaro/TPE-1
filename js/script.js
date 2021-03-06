"use strict"
document.addEventListener("DOMContentLoaded", function(){
    let app = new Vue({
        el: "#comentarios_api",
        data: {
            title: "Lista de comentarios por CSR",
            loading: false,
            comentarios: [],
            promedio: 0,
            admin: false
        },
         
        methods: {
            deleteComent: function (event, idcomentario){
            fetch("api/comentarios/"+idcomentario,{
                "method" : "DELETE"
            })
            .then(response => response.json())
            .then( () => {
                getComentarios();
                console.log("Consulta DELETE exitosa");
            })
            .catch(error => console.log(error));
            },

            addComent: function (event){
                let data = {
                    cuerpo: document.querySelector("#input-coment").value,
                    puntaje: document.querySelector("#select-puntaje").value,
                    id_pelicula_fk : document.querySelector(".idpelicula").value,
                    id_user_fk : document.querySelector(".username-id").id
                };
                fetch("api/comentarios",{
                    "method" : "POST",
                    headers: {'Content-Type': 'application/json'},       
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(() =>{
                    getComentarios();
                    console.log("Consulta POST exitosa")
                })
                .catch(error => console.log(error));
            },
            
            play: function (event){
                document.querySelector(".contenedor").classList.add('fade');
                document.querySelector(".section_container").classList.add("section_class");
                document.querySelector(".contenedor_text").classList.add("text_container");
                document.querySelector(".fondo").classList.add("fondo_class");
                audio.loop=false;
                audio.load();
                audio.play();
            },
            stop: function (event){
                document.querySelector(".contenedor").classList.remove('fade');
                document.querySelector(".section_container").classList.remove("section_class");
                document.querySelector(".contenedor_text").classList.remove("text_container");
                document.querySelector(".fondo").classList.remove("fondo_class");
                audio.loop=false;
                audio.pause();
            },
            
        },
    });
        let audio = new Audio();
        audio.src= "https://www.thesoundarchive.com/starwars/star-wars-theme-song.mp3";
        //let idpelicula = document.querySelector(".container").data-idpelicula;
        document.addEventListener("load", getComentarios());
        function getComentarios(){
            let idpelicula = document.querySelector(".container").dataset.idpelicula;
            console.log(idpelicula);
            app.loading = true;
            fetch("api/peliculas/"+idpelicula+"/comentarios")
            .then(response => response.json())
            .then(comentarios => {
                app.comentarios = comentarios;
                app.promedio = hacerPromedio(comentarios);
                console.log("Consulta GET exitosa");
                app.loading = false;
            })
            .catch(error => console.log(error));
        };
        document.querySelector("#btn-refresco").addEventListener('click', getComentarios);

        function hacerPromedio(comentarios){
            let Puntaje= 0;
            let cont = 0;
            for(let comentario of comentarios){
                Puntaje += Number(comentario.puntaje);
                cont++;
            }
            Puntaje = Puntaje/cont;
            let Promedio = Puntaje.toFixed(2);

            return Promedio;
        }
});