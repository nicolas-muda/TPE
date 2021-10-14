"use stric"
//los botones de peliculas
document.querySelector("#crearPelicula").addEventListener("click", mostrarCrearPelicula);
document.querySelector("#editarPelicula").addEventListener("click", mostrarEditarPelicula);
document.querySelector("#borrarPelicula").addEventListener("click", mostrarBorrarPelicula);
//los botones de genero
document.querySelector("#crearGenero").addEventListener("click", mostrarCrearGenero);
document.querySelector("#editarGenero").addEventListener("click", mostrarEditarGenero);
document.querySelector("#borrarGenero").addEventListener("click", mostrarBorrarGenero);

function mostrarCrearPelicula() {
    document.getElementById('crearPeli').classList.toggle('ocultar');
}
function mostrarEditarPelicula() {
    document.getElementById('editarPeli').classList.toggle('ocultar');
}
function mostrarBorrarPelicula() {
    document.getElementById('borrarPeli').classList.toggle('ocultar');
}

function mostrarCrearGenero() {
    document.getElementById('formCrearGenero').classList.toggle('ocultar');
}
function mostrarEditarGenero() {
    document.getElementById('formEditarGenero').classList.toggle('ocultar');
}
function mostrarBorrarGenero() {
    document.getElementById('formBorrarGenero').classList.toggle('ocultar');
}