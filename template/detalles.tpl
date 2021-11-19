{include file="template/head.tpl"}
{include file="template/navbar.tpl"}
<div class="container">
    <h1>{$pelicula->nombre_pelicula}</h1>
    <img src="img/carteles/{$pelicula->id_pelicula}.jpg" width="300">
    <p>duracion: {$pelicula->duracion} </p>
    <p>puntuacion: {$pelicula->puntuacion} </p>
    <p>descripcion: {$pelicula->descripcion}</p>
    <p>genero: {$pelicula->genero}</p>
    <h1>comentarios</h1>
    {if isset($smarty.session.id)}
        <form id="formulario-comentario" action="crearpelicula" method="post">
            <div class="mb-3">
                <label class="form-label">ingrese descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">puntuacion</label>
                <select class="form-select" aria-label="Default select example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">publicar</button>
        </form>
    {/if}
</div>
{*
<div class="row">
            <div class="col">
            <label class="form-label">descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" placeholder="ingrese descripcion"
                    required></textarea>
            </div>
            <div class="col">
                <label class="form-label">puntuacion</label>
                <select class="form-select" aria-label="Default select example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
*}
{*
<form action="crearpelicula" method="post">
            <div class="mb-3">
                <label class="form-label">ingrese descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">puntuacion</label>
                <select class="form-select" aria-label="Default select example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">publicar</button>
        </form>

        
*}
<div id="tabla-comentarios">
    {*aca van a ir la tabla de los comentarios de la pelicula*}
</div>
</div>
<script src="./js/comentarios.js"></script>
{include file="template/footer.tpl"}