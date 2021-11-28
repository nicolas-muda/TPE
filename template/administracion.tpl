{include file="template/head.tpl"}
{include file="template/navbar.tpl"}
<div class="container">
    <h1>usuarios y roles</h1>
    <table class="table table-dark table-striped">
        <tr>
            <th>email</th>
            <th>rol</th>
            <th>cambio rol</th>
            <th>eliminar usuario</th>
        </tr>
        {foreach from=$usuarios  item=usuario}
            <tr>
                <td>{$usuario->email}</td>
                <td>{$usuario->rol}</td>
                {if $usuario->id!=$smarty.session.id}
                    {if $usuario->rol==$ROLES[1]}
                        <td><a href="rol/{$usuario->id}/{$ROLES[0]}">cambiar rol</a></td>
                    {else}
                        <td><a href="rol/{$usuario->id}/{$ROLES[1]}">cambiar rol</a></td>
                    {/if}
                    <td><a href="eliminarUsuario/{$usuario->id}">eliminar</a></td>
                {else}
                    <td colspan="2">
                        <p>no puedes modificarte tu propio rol ni eliminar tu propia cuenta</p>
                    </td>
                {/if}
            </tr>
        {/foreach}
    </table>
    {if $mensaje}
        <div class="alert alert-danger" role="alert">
            {$mensaje}
        </div>
    {/if}
</div>
{include file="template/footer.tpl"}