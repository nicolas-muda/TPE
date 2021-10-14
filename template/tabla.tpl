<div class="container">
    <h3>lista de peliculas</h3>
    <table class="table table-dark table-striped">
        <tr>
            <th>Nombre</th>
            <th>Puntuacion</th>
            <th>Duracion</th>
            <th>Descripcion</th>
            <th>genero</th>
        </tr>
        {foreach from=$peliculas  item=$pelicula}
            <tr>
                {foreach from=$pelicula  item=$valor}
                    <td>{$valor}</td>
                {{/foreach}}
            </tr>
        {/foreach}
    </table>
<div>