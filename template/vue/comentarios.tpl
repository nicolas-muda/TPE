    {literal}
        <div id="tabla-comentarios" class="container">
            <h1> {{ subtitle }} </h1>
            <div>
                <label class="form-label">ordenar:</label>
                <button type="submit" v-on:click="ordenar('fecha_comentario','ASC')" class="btn btn-info">fecha asc</button>
                <button type="submit" v-on:click="ordenar('fecha_comentario','DESC')" class="btn btn-info">fecha
                    des</button>
                <button type="button" v-on:click="ordenar('puntuacion','ASC')" class="btn btn-info">calificacion
                    asc</button>
                <button type="button" v-on:click="ordenar('puntuacion','DESC')" class="btn btn-info">calificacion
                    des</button>
            </div>
        {/literal}
        {if {$smarty.session.rol} == "administrador"}
            {literal}
                <table class="table table-dark table-striped">
                    <tr>
                        <th>comentario</th>
                        <th>puntuacion</th>
                        <th>fecha</th>
                        <th>usuario</th>
                        <th>eliminar</th>
                    </tr>
                    <tr v-if="comentarios==false">
                        <th colspan="5">aun no hay comentarios sobre la pelicula</th>
                    </tr>
                    <tr v-for="comentario in comentarios">
                        <td>{{comentario.comentario}}</td>
                        <td>{{comentario.puntuacion}}</td>
                        <td>{{comentario.fecha_comentario}}</td>
                        <td>{{comentario.email}}</td>
                        <td><button type="button" v-on:click="borrar(comentario.id)" class="btn btn-danger">eliminar</button>
                        </td>
                    </tr>
                </table>
            </div>
        {/literal}
    {else}
        {literal}
            <table class="table table-dark table-striped">
                <tr>
                    <th>comentario</th>
                    <th>puntuacion</th>
                    <th>fecha</th>
                    <th>usuario</th>
                </tr>
                <tr v-if="comentarios==false">
                    <th colspan="4">aun no hay comentarios sobre la pelicula</th>
                </tr>
                <tr v-for="comentario in comentarios">
                    <td>{{comentario.comentario}}</td>
                    <td>{{comentario.puntuacion}}</td>
                    <td>{{comentario.fecha_comentario}}</td>
                    <td>{{comentario.email}}</td>
                    </td>
                </tr>
            </table>
            </div>
        {/literal}
    {/if}
    {literal}
        <div class="container">
            <form>
                <label class="form-label">seleccione la puntuacion a filtrar</label>
                <select class="form-select" id="puntuacion" name="puntuacion" aria-label="Default select example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <button type="submit" id="filtrado" class="btn btn-info">filtrar</button>
                <button type="button" id="todo" class="btn btn-info">mostrar todo</button>
            </form>
        </div>
{/literal}