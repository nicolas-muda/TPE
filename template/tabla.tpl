<div class="container">
    <h3>lista de peliculas</h3>
    <table class="table table-dark table-striped">
        <tr>
            <th>Nombre</th>
            <th>Puntuacion</th>
            <th>Duracion</th>
            <th>Descripcion</th>
            <th>genero</th>
            <th>detalles</th>
        </tr>
        {foreach from=$peliculas  item=$pelicula}
            <tr>
                {foreach from=$pelicula  item=$valor}
                    <td>{$valor}</td>
                {{/foreach}}
                <td><a href="mostrardetalles/{$pelicula->id_pelicula}">ver detalles</a></td>
            </tr>
        {/foreach}
    </table>
<div>