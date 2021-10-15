<div class="container">
    <h3>lista de peliculas</h3>
    <table class="table table-dark table-striped">
        <tr>
            <th>id</th>
            <th>Duracion</th>
            <th>Descripcion</th>
            <th>genero</th>
            <th>Nombre</th>
            <th>Puntuacion</th>
            <th>detalles</th>
        </tr>
        {foreach from=$peliculas  item=$pelicula}
            <tr>
                <td>{$pelicula->id_pelicula}</td>
                <td>{$pelicula->duracion}</td>
                <td>{$pelicula->descripcion}</td>
                <td>{$pelicula->genero}</td>
                <td>{$pelicula->nombre_pelicula}</td>
                <td>{$pelicula->puntuacion}</td>
                <td><a href="mostrardetalles/{$pelicula->id_pelicula}">ver detalles</a></td>
            </tr>
        {/foreach}
    </table>
<div>