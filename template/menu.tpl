{include file="template/head.tpl"}
{include file="template/navbar.tpl"}
{include file="template/lanzamientos.tpl"}
{include file="template/tabla.tpl"}
{if $mensaje}
    <div class="container">
        <div class="alert alert-danger" role="alert">
            {$mensaje}
        </div>
    </div>
{/if}
{*formulario de filtrado por genero*}
<div class="container">
    <form action="peliculasFiltradas" method="post">
        <div class="mb-3">
            <label class="form-label">filtrar peliculas por genero:</label>
            <select name='genero' class="form-select">
                {foreach from=$categorias item=categoria}
                    <option value="{$categoria->id_generos}">{$categoria->genero}</option>
                {/foreach}
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-info">filtrar</button>
            <a href="home">
                <input type="button" class="btn btn-info" value="mostrar todos">
            </a>
        </div>
    </form>
</div>
{*formulario de creacion de peliculas y generos*}
{if isset($smarty.session.rol) && $smarty.session.rol == "administrador"}
    <hr>
    {*formulario de peliculas*}
    <div>
        <div class="botonera">
            <button type="button" id="crearPelicula" class="btn btn-info boton">crear pelicula</button>
            <button type="button" id="borrarPelicula" class="btn btn-info boton">borrar pelicula</button>
        </div>

        <div id="crearPeli" class="ocultar">
            <h1>crear pelicula</h1>
            <form action="crearpelicula" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">ingrese el nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" required>
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
                <div class="mb-3">
                    <label class="form-label">ingrese portada (opcional)</label>
                    <input type="file" name="portada" class="form-control">
                </div>
                <button type="submit" class="btn btn-info">crear</button>
            </form>
        </div>

        <div id="borrarPeli" class="ocultar">
            <h1>borrar pelicula</h1>
            <form action="borrarpelicula" method="post">
                <div class="mb-3">
                    <label class="form-label">seleccione la pelicula</label>
                    <select name='id' class="form-select">
                        {foreach from=$peliculas item=pelicula}
                            <option value="{$pelicula->id_pelicula}">{$pelicula->nombre_pelicula}</option>
                        {/foreach}
                    </select>
                </div>
                <button type="submit" class="btn btn-danger">borrar</button>
            </form>
        </div>
        <hr>
    </div>
    {*formulario de generos*}
    <div>
        <div class="botonera">
            <button type="button" id="crearGenero" class="btn btn-info boton">crear genero</button>
            <button type="button" id="editarGenero" class="btn btn-info boton">editar genero</button>
            <button type="button" id="borrarGenero" class="btn btn-info boton">borrar genero</button>
        </div>

        <div id="formCrearGenero" class="ocultar">
            <h1>crear genero</h1>
            <form action="crearGenero" method="post">
                <div class="mb-3">
                    <label class="form-label">ingrese el nombre del nuevo genero</label>
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" required>
                </div>
                <button type="submit" class="btn btn-info">crear</button>
            </form>
        </div>

        <div id="formEditarGenero" class="ocultar">
            <h1>editar genero</h1>
            <form action="editarGenero" method="post">
                <div class="mb-3">
                    <label class="form-label">seleccione genero</label>
                    <select name='id' class="form-select">
                        {foreach from=$categorias item=categoria}
                            <option value="{$categoria->id_generos}">{$categoria->genero}</option>
                        {/foreach}
                    </select>
                    <label class="form-label">ingrese el nuevo nombre</label>
                    <input type="text" class="form-control" name="nuevo" placeholder="nombre" required>
                </div>
                <button type="submit" class="btn btn-info">editar</button>
            </form>
        </div>

        <div id="formBorrarGenero" class="ocultar">
            <h1>borrar genero</h1>
            <form action="borrarGenero" method="post">
                <div class="mb-3">
                    <label class="form-label">seleccione genero</label>
                    <select name='id' class="form-select">
                        {foreach from=$categorias item=categoria}
                            <option value="{$categoria->id_generos}">{$categoria->genero}</option>
                        {/foreach}
                    </select>
                </div>
                <button type="submit" class="btn btn-danger">borrar</button>
            </form>
        </div>
    </div>
{/if}

<script src="js/botonera.js"></script>
{include file="template/footer.tpl"}