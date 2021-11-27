{include file="template/head.tpl"}
{include file="template/navbar.tpl"}
<div class="container">
    <h1>{$pelicula->nombre_pelicula}</h1>
    <img src="img/carteles/{$pelicula->id_pelicula}.jpg" width="300">
    <p>duracion: {$pelicula->duracion} </p>
    <p>puntuacion de ultra pelis: {$pelicula->puntuacion} </p>
    <p>descripcion: {$pelicula->descripcion}</p>
    <p>genero: {$pelicula->genero}</p>
    {*editar la pelicula*}
    {if isset($smarty.session.rol) && $smarty.session.rol == "administrador"}
        <hr>
        <div class="botonera">
            <button type="button" id="editarPelicula" class="btn btn-info boton">editar pelicula</button>
        </div>
        {*formulario para editar la pelicula*}
        <div id="editarPeli" class="ocultar">
            <h1>editar pelicula</h1>
            <form action="editarpelicula/{$pelicula->id_pelicula}" method="post">
                <div class="mb-3">
                    <label class="form-label">ingrese la duracion</label>
                    <input type="text" class="form-control" name="nombre" placeholder="nuevo nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ingrese la puntuacion</label>
                    <input type="number" class="form-control" name="puntuacion" placeholder="de 1 a 10" max="10" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ingrese la duracion</label>
                    <input type="text" class="form-control" name="duracion" placeholder="xh xxm" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ingrese descripcion</label>
                    <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">seleccione categoria</label>
                    <select name='genero' class="form-select">
                        {foreach from=$categorias item=categoria}
                            <option value="{$categoria->id_generos}">{$categoria->genero}</option>
                        {/foreach}
                    </select>
                </div>
                <button type="submit" class="btn btn-info">editar</button>
            </form>
        </div>
        <hr>
    {/if}
    {if isset($smarty.session.id)}
        <h3>crear comentario</h3>
        <form id="formulario-comentario" method="post">
            <div class="mb-3">
                <label class="form-label">ingrese comentario</label>
                <textarea class="form-control" name="comentario" rows="3" required></textarea>
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
<script src="./js/botoneraDetalles.js"></script>
<script src="./js/comentariosvs.js"></script>
{include file="template/footer.tpl"}