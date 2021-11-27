"use strict"

document.querySelector("#editarPelicula").addEventListener("click", mostrarEditarPelicula);

function mostrarEditarPelicula() {
    document.getElementById('editarPeli').classList.toggle('ocultar');
}
