{include file="template/head.tpl"}
{include file="template/navbar.tpl"}
<div class="login">
    <div class="container">
        <h1>iniciar sesión</h1>
        <form action="verificar" method="post">
            <div class="mb-3">
                <label class="form-label">ingrese el email</label>
                <input type="email" class="form-control" name="email" placeholder="ejemplo@gmail.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ingrese la contraseña</label>
                <input type="password" class="form-control" name="contraseña" placeholder="contraseña" required>
            </div>
            <button type="submit" class="btn btn-info">ingresar</button>
        </form>
    </div>
    <div class="container">
        <h1>crear usuario</h1>
        <form action="crear" method="post">
            <div class="mb-3">
                <label class="form-label">ingrese el email</label>
                <input type="email" class="form-control" name="email" placeholder="ejemplo@gmail.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ingrese la contraseña</label>
                <input type="password" class="form-control" name="contraseña" placeholder="contraseña" required>
            </div>
            <div class="mb-3">
                <label class="form-label">confirme contraseña</label>
                <input type="password" class="form-control" name="confirmacion" placeholder="contraseña" required>
            </div>
            <button type="submit" class="btn btn-info">crear usuario</button>
        </form>
    </div>
</div>
{if $mensaje}
    <br>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            {$mensaje}
        </div>
    </div>
{/if}

{include file="template/footer.tpl"}