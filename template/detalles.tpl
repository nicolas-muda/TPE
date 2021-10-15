{include file="template/head.tpl"}
{include file="template/navbar.tpl"}
<h1>{$pelicula->nombre_pelicula}</h1>
<p>{$pelicula->duracion}<p>
<p>{$pelicula->puntuacion}<p>
<p>{$pelicula->descripcion}<p>
<p>{$pelicula->genero}<p>
{include file="template/footer.tpl"}