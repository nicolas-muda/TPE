"use strict"

getComentarios();
async function getComentarios() {
    const url = "api/comentario/1";
    try {
        let res = await fetch(url);
        let comentarios = await res.json();
        //estudiar como renderizar estos comentarios en vue.js
        comentarios.forEach(comentario => {
            console.log(comentario['comentario']);
            console.log(comentario['id_usuario']);
            console.log(comentario['fecha_comentario']);
            console.log(comentario['id_usuario']);
        });
        
    } catch (error) {
        console.log(error);
    }
}
