let app = new Vue({
    el: "#tabla-comentarios",
    data: {
        subtitle: "comentarios",
        comentarios: []
    },
    methods: {
        borrar: function (id) {
            borrarComentario(id);
        },
        ordenar: function (criterio, orden) {
            ordenamiento(criterio, orden)
        }
    }
});


getComentarios();
async function getComentarios() {
    //agarro la url de la pagina actual para poder sacar el id de la pelicula y este pasarselo a la constante url para llamar al api router
    var urlEntera = window.location.href;
    var idPelicula = urlEntera.substring(urlEntera.lastIndexOf('/') + 1);
    const url = "api/comentario/" + idPelicula;

    try {
        let res = await fetch(url);
        let comentarios = await res.json();
        app.comentarios = comentarios;
    } catch (error) {
        console.log(error);
    }
}

async function ordenamiento(criterio, orden) {
    var urlEntera = window.location.href;
    var idPelicula = urlEntera.substring(urlEntera.lastIndexOf('/') + 1);
    const url = "api/comentario/" + idPelicula +"?criterio="+criterio+"&orden="+orden;
    //+ "/" + criterio + "/" + orden;
    try {
        let res = await fetch(url);
        let comentarios = await res.json();
        app.comentarios = comentarios;

    } catch (error) {
        console.log(error);
    }
}

async function getComentariosPuntuacion(e) {
    e.preventDefault();
    let puntuacion = document.querySelector("#puntuacion").value;
    //agarro la url de la pagina actual para poder sacar el id de la pelicula y este pasarselo a la constante url para llamar al api router
    var urlEntera = window.location.href;
    var idPelicula = urlEntera.substring(urlEntera.lastIndexOf('/') + 1);
    const url = "api/comentario/" + idPelicula + "/" + puntuacion;
    try {
        let res = await fetch(url);
        let comentarios = await res.json();
        app.comentarios = comentarios;

    } catch (error) {
        console.log(error);
    }
}

function agregarComentario(e) {
    e.preventDefault();

    var urlEntera = window.location.href;
    var idPelicula = urlEntera.substring(urlEntera.lastIndexOf('/') + 1);
    const url = "api/comentario/" + idPelicula;

    let data = {
        comentario: document.querySelector("textarea[name=comentario]").value,
        puntuacion: document.querySelector("select[name=puntuacion]").value,
    }

    
    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
        .then(response => {
            if (!response.ok) {
                throw console.log("error");
            }
        })
        .then(coment => {
            console.log("comentario creado");
            getComentarios();
        })
        .catch(error => console.log(error));
}

async function borrarComentario(id) {

    const url = "api/comentario/" + id;

    try {
        let res = await fetch(url, {
            "method": "DELETE",
            "headers": { "Content-type": "application/json" },
        });
        if (res.status == 200) {
            console.log("comentario eliminado");
            getComentarios();
        }
    } catch (error) {
        console.log(error);
    }
}
document.querySelector("#todo").addEventListener("click", () => getComentarios());
document.querySelector("#filtrado").addEventListener("click", (e) => getComentariosPuntuacion(e));
document.querySelector("#formulario-comentario").addEventListener("submit", (e) => agregarComentario(e));
document.querySelector("#todo").addEventListener("click", () => getComentarios());