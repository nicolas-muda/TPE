<div class="container">
    <h3>lista de peliculas</h3>
    <table class="table table-dark table-striped">
        <tr>
            <th>Nombre</th>
            <th>Duracion</th>
            <th>Descripcion</th>
            <th>genero</th>
            <th>Puntuacion</th>
            <th>detalles</th>
        </tr>
        {if $peliculas==null }
            <td colspan="6">no hay peliculas disponibles de ese genero</td>
        {/if}
        {foreach from=$peliculas  item=$pelicula}
            <tr>
                <td>{$pelicula->nombre_pelicula}</td>
                <td>{$pelicula->duracion}</td>
                <td>{$pelicula->descripcion}</td>
                <td>{$pelicula->genero}</td>
                <td>{$pelicula->puntuacion}</td>
                <td><a href="mostrardetalles/{$pelicula->id_pelicula}">ver detalles</a></td>
            </tr>
        {/foreach}
    </table>
<div>