{include file="template/head.tpl"}
{include file="template/navbar.tpl"}
<div class="container">
    <h1>{$pelicula->nombre_pelicula}</h1>
    <p>duracion: {$pelicula->duracion} </p>
    <p>puntuacion: {$pelicula->puntuacion} </p>
    <p>descripcion: {$pelicula->descripcion}</p>
    <p>genero: {$pelicula->genero}</p>
</div>
{include file="template/footer.tpl"}