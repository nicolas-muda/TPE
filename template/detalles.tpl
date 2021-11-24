{include file="template/head.tpl"}
{include file="template/navbar.tpl"}
<div class="container">
    <h1>{$pelicula->nombre_pelicula}</h1>
    <img src="img/carteles/{$pelicula->id_pelicula}.jpg" width="300">
    <p>duracion: {$pelicula->duracion} </p>
    <p>puntuacion de ultra pelis: {$pelicula->puntuacion} </p>
    <p>descripcion: {$pelicula->descripcion}</p>
    <p>genero: {$pelicula->genero}</p>
    {if isset($smarty.session.id)}
        <h3>crear comentario</h3>
        <form id="formulario-comentario" method="post">
            <div class="mb-3">
                <label class="form-label">ingrese descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">puntuacion</label>
                <select class="form-select" name="puntuacion" aria-label="Default select example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" id="enviar" class="btn btn-info">publicar</button>
        </form>
    {/if}
</div>
{include file="template/vue/comentarios.tpl"}
<script src="./js/comentariosvs.js"></script>
{include file="template/footer.tpl"}